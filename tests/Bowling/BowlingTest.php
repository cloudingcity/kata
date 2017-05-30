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
        for ($i = 0; $i < 20; $i++) {
            $this->bowling->roll(0);
        }
        $this->assertEquals(0, $this->bowling->score());
    }

    public function testScore20()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->bowling->roll(1);
        }
        $this->assertEquals(20, $this->bowling->score());
    }
}
