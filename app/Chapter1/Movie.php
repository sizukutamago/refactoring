<?php
declare(strict_types=1);
namespace App\Chapter1;

class Movie
{
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private $title;
    private $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $arg): void
    {
        $this->priceCode = $arg;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
