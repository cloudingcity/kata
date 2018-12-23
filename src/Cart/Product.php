<?php

declare(strict_types=1);

namespace Clouding\Kata\Cart;

class Product implements Productable
{
    protected $name = '';

    protected $price = 0;

    protected $tag = '';

    public function __construct($name, $price, $tag)
    {
        $this->name = $name;
        $this->price = $price;
        $this->tag = $tag;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTag(): string
    {
        return $this->tag;
    }
}
