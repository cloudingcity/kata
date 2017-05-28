<?php

use PHPUnit\Framework\TestCase;
use Clouding\kata\Cart\Product;

class ProductTest extends TestCase
{
    public function testProductConstructorAndGetter()
    {
        $product = new Product('Product 1', 245, 'R');
        $this->assertEquals('Product 1', $product->getName());
        $this->assertEquals(245, $product->getPrice());
        $this->assertEquals('R', $product->getTag());
    }
}
