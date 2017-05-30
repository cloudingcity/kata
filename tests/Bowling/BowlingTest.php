<?php
/**
 * Created by PhpStorm.
 * User: clouding
 * Date: 2017/5/30
 * Time: 下午 08:37
 */

use Clouding\kata\Bowling\Bowling;
use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    private $bowling = null;

    public function setUp()
    {
        $this->bowling = new Bowling();
    }

    public function tearDown()
    {
        $this->bowling = null;
    }

    public function testScore0()
    {
        $this->rollMany(0, 20);
        $this->assertEquals(0, $this->bowling->score());
    }

    public function testScore20()
    {
        $this->rollMany(1, 20);
        $this->assertEquals(20, $this->bowling->score());
    }

    public function testScore14()
    {
        $this->rollSpare();
        $this->bowling->roll(2);
        $this->rollMany(0, 17);
        $this->assertEquals(14, $this->bowling->score());
    }

    public function testScore19()
    {
        $this->rollSpare();
        $this->bowling->roll(2);
        $this->bowling->roll(5);
        $this->rollMany(0, 16);
        $this->assertEquals(19, $this->bowling->score());
    }

    public function rollMany($pins, $times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->bowling->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->bowling->roll(2);
        $this->bowling->roll(8);
    }
}
