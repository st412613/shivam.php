<?php

namespace App;

use InvalidArgumentException;

class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name,  $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (trim($name) === '') {
            throw new InvalidArgumentException("Product name cannot be empty.");
        }

        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice( $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException("Price cannot be negative.");
        }

        if ($price > 1000000) {
            throw new \Exception("Price cannot be greater than 1,000,000.");
        }

        $this->price = $price;
    }
}
