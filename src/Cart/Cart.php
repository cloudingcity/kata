<?php

namespace Clouding\kata\Cart;

class Cart
{
    public function addProduct(Productable $product)
    {

    }

    public function checkout()
    {
        throw new CartException('Products match error');
    }
}
