<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/13
 * Time: 18:23
 */
declare(strict_types=1);
namespace App\Chapter1;


use function Couchbase\defaultDecoder;

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
            $thisAmount = 0;
            switch ($rental->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDeyRented() > 2) {
                        $thisAmount += ($rental->getDeyRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->getDeyRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($rental->getDeyRented() > 3) {
                        $thisAmount += ($rental->getDeyRented() - 3) * 1.5;
                    }
                    break;
            }
            //レンタルポイントを加算
            $frequentRenterPoints++;
            //新作を二日以上借りた場合はボーナスポイント
            if (($rental->getMovie()->getPriceCode() === Movie::NEW_RELEASE) && $rental->getDeyRented() > 1) {
                $frequentRenterPoints++;
            }
            //この貸し出しに関する数値の表示
            $result .= "\t {$rental->getMovie()->getTitle()} \t {$thisAmount}" . PHP_EOL;
            $totalAmount += $thisAmount;
        }
        //フッタ部分の追加
        $result .= "Amount owed is {$totalAmount}" . PHP_EOL;
        $result .= "You earned {$frequentRenterPoints} frequent renter points";
        return $result;
    }
}