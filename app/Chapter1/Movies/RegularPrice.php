<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/14
 * Time: 12:01
 */

namespace App\Chapter1\Movies;


use App\Chapter1\Movie;

class RegularPrice extends Price
{
    /**
     * @return int
     */
    public function getPriceCode(): int
    {
        return Movie::REGULAR;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge(int $daysRented): float
    {
        $result = 2;
        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }
        return $result;
    }
}