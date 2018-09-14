<?php
declare(strict_types=1);
namespace App\Chapter1;

use App\Chapter1\Movies\ChildrenPrice;
use App\Chapter1\Movies\NewReleasePrice;
use App\Chapter1\Movies\Price;
use App\Chapter1\Movies\RegularPrice;

class Movie
{
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private $title;

    /**
     * @var Price
     */
    private $price;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    /**
     * @return Price
     */
    public function getPriceCode(): Price
    {
        return $this->price;
    }

    /**
     * @param int $arg
     */
    public function setPriceCode(int $arg): void
    {
        switch ($arg) {
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            case self::CHILDRENS:
                $this->price = new ChildrenPrice();
                break;
            default:
                throw new \InvalidArgumentException('不正な料金コードです');
        }
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge(int $daysRented): float
    {
        return $this->price->getCharge($daysRented);
    }

    /**
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints(int $daysRented): int
    {
        return $this->price->getFrequentRenterPoints($daysRented);
    }
}
