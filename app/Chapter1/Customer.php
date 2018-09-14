<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/13
 * Time: 18:23
 */
declare(strict_types=1);
namespace App\Chapter1;


class Customer
{
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for {$this->getName()}" . PHP_EOL;

        foreach ($this->rentals as $rental) {
            //この貸し出しに関する数値の表示
            $result .= "\t {$rental->getMovie()->getTitle()} \t {$rental->getCharge()}" . PHP_EOL;
        }
        //フッタ部分の追加
        $result .= "Amount owed is {$this->getTotalCharge()}" . PHP_EOL;
        $result .= "You earned {$this->getTotalFrequentRenterPoints()} frequent renter points";
        return $result;
    }

    /**
     * @return string
     */
    public function htmlStatement(): string
    {
        $result = "<h1>Rentals for <em>{$this->name}</em></h1>" . PHP_EOL;
        foreach ($this->rentals as $rental) {
            $result .= "<p>{$rental->getMovie()->getTitle()}: {$rental->getCharge()}</p>" . PHP_EOL;
        }

        $result .= "<p>You owe <em>{$this->getTotalCharge()}</em></p>" . PHP_EOL;
        $result .= "<p>On this rental you earned <em>{$this->getTotalFrequentRenterPoints()}</em> frequent renter ponts</p>";
        return $result;
    }

    /**
     * @return float
     */
    private function getTotalCharge(): float
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getCharge();
        }
        return $result;
    }

    /**
     * @return int
     */
    private function getTotalFrequentRenterPoints(): int
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getFrequentRenterPoints();
        }
        return $result;
    }
}