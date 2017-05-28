<?php

namespace Clouding\kata\Cart;

class Cart
{
    private $products = [
        'R' => [],
        'G' => [],
    ];

    private $total = 0;

    public function addProduct(Productable $product)
    {
        $this->products[$product->getTag()][] = $product;
    }

    public function checkout()
    {
        $redCount = count($this->products['R']);
        $greenCount = count($this->products['G']);

        if ($redCount !== $greenCount) {
            throw new CartException('Products match error');
        }

        array_map(function($product) {
            $this->total += $product->getPrice();
        }, $this->products['R']);

        array_map(function($product) {
            $this->total += $product->getPrice();
        }, $this->products['G']);

        $this->total *= 0.75;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
