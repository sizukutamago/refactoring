<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/14
 * Time: 11:59
 */

namespace App\Chapter1\Movies;


use App\Chapter1\Movie;

class ChildrenPrice extends Price
{
    public function getPriceCode(): int
    {
        return Movie::CHILDRENS;
    }

    public function getCharge(int $daysRented): float
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
        }
        return $result;
    }
}