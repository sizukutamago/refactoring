<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/14
 * Time: 12:00
 */

namespace App\Chapter1\Movies;


use App\Chapter1\Movie;

class NewReleasePrice extends Price
{
    /**
     * @return int
     */
    public function getPriceCode(): int
    {
        return Movie::NEW_RELEASE;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge(int $daysRented): float
    {
        return $daysRented * 3;
    }

    public function getFrequentRenterPoints(int $daysRented): int
    {
        return $daysRented > 1 ? 2 : 1;
    }
}