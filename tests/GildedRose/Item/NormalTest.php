<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose\Item;

use Clouding\Kata\GildedRose\Item\Normal;
use PHPUnit\Framework\TestCase;

class NormalTest extends TestCase
{
    public function provider()
    {
        return [
            [['quality' => 10, 'sellIn' => 5], ['quality' => 9, 'sellIn' => 4]],
            [['quality' => 10, 'sellIn' => 0], ['quality' => 8, 'sellIn' => -1]],
            [['quality' => 10, 'sellIn' => -5], ['quality' => 8, 'sellIn' => -6]],
            [['quality' => 0, 'sellIn' => 5], ['quality' => 0, 'sellIn' => 4]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param array $original
     * @param array $expected
     */
    public function testTick(array $original, array $expected)
    {
        $item = new Normal($original['quality'], $original['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
