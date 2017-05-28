<?php

use PHPUnit\Framework\TestCase;
use Clouding\kata\Cart\Cart;
use Clouding\kata\Cart\Product;
use Clouding\kata\Cart\CartException;

class CartTest extends TestCase
{
    private $cart = null;

    private $products = [];

    public function setUp()
    {
        $this->cart = new Cart();
        $this->products = [
            new Product('Red 1', 200, 'R'),
            new Product('Red 2', 160, 'R'),
            new Product('Green 1', 80, 'G'),
            new Product('Green 2', 160, 'G'),
        ];
    }

    public function tearDown()
    {
        $this->cart = null;
        $this->products = [];
    }

    public function testAddOneRedProduct()
    {
        $this->expectException(CartException::class);
        $this->cart->addProduct($this->products[0]);
        $this->cart->checkout();
    }

    public function testAddOneRedProductAndOneGreenProduct()
    {
        $this->cart->addProduct($this->products[0]); // Red 1
        $this->cart->addProduct($this->products[2]); // Green 1
        $this->cart->checkout();
        $this->assertEquals(210, $this->cart->getTotal());
    }
}
