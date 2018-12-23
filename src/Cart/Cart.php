<?php

declare(strict_types=1);

namespace Clouding\Kata\Cart;

class Cart
{
    protected $products = [
        'R' => [],
        'G' => [],
    ];

    protected $total = 0;

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

        $this->updateTotal($this->products['R']);
        $this->updateTotal($this->products['G']);

        $this->total *= 0.75;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    protected function updateTotal($products)
    {
        array_map(function ($product) {
            $this->total += $product->getPrice();
        }, $products);
    }
}
