<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose;

use Clouding\Kata\GildedRose\GildedRose;
use Clouding\Kata\GildedRose\Item\BackstagePass;
use Clouding\Kata\GildedRose\Item\Brie;
use Clouding\Kata\GildedRose\Item\Normal;
use Clouding\Kata\GildedRose\Item\Sulfura;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testOf()
    {
        $item = GildedRose::of('normal', 1, 1);
        $this->assertInstanceOf(Normal::class, $item);

        $item = GildedRose::of('Aged Brie', 1, 1);
        $this->assertInstanceOf(Brie::class, $item);

        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 1, 1);
        $this->assertInstanceOf(Sulfura::class, $item);

        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC convert', 1, 1);
        $this->assertInstanceOf(BackstagePass::class, $item);
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('ABC is not supported.');

        GildedRose::of('ABC', 1, 1);
    }
}
