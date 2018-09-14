<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/13
 * Time: 18:14
 */
declare(strict_types=1);
namespace App\Chapter1;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    private $daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function day(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    /**
     * @return float
     */
    public function getCharge(): float
    {
        return $this->movie->getCharge($this->daysRented);
    }

    /**
     * @return int
     */
    public function getFrequentRenterPoints(): int
    {
        return $this->movie->getFrequentRenterPoints($this->daysRented);
    }
}
