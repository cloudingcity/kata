<?php

declare(strict_types=1);

namespace Clouding\Kata\Cart;

interface Productable
{
    public function getName();
    public function getPrice();
    public function getTag();
}
