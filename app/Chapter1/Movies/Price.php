<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/14
 * Time: 11:58
 */

namespace App\Chapter1\Movies;


abstract class Price
{
    /**
     * @return int
     */
    abstract public function getPriceCode(): int;

    /**
     * @param int $daysRented
     * @return float
     */
    abstract public function getCharge(int $daysRented): float;

    /**
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints(int $daysRented): int
    {
        return 1;
    }
}