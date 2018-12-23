<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests;

use PHPUnit\Framework\TestCase;
use Clouding\Kata\Cart\Product;

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
