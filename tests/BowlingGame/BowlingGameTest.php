<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\BowlingGame;

use Clouding\Kata\BowlingGame\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /**
     * @var \Clouding\Kata\BowlingGame\BowlingGame
     */
    protected $bowling;

    protected function setUp()
    {
        $this->bowling = new BowlingGame();
    }

    protected function tearDown()
    {
        unset($this->bowling);
    }

    public function testAllGutters()
    {
        $this->rollMany(20, 0);

        $this->assertSame(0, $this->bowling->score());
    }

    public function testAllOne()
    {
        $this->rollMany(20, 1);

        $this->assertSame(20, $this->bowling->score());
    }

    public function testOneSpareAndOtherGutters()
    {
        $this->rollSpare();
        $this->bowling->roll(5);
        $this->rollMany(17, 0);

        $this->assertSame(20, $this->bowling->score());
    }

    public function testOneStrikeAndOtherGutters()
    {
        $this->rollStrike();
        $this->bowling->roll(7);
        $this->bowling->roll(2);
        $this->rollMany(17, 0);

        $this->assertSame(28, $this->bowling->score());
    }

    public function testPerfectGame()
    {
        $this->rollMany(12, 10);

        $this->assertSame(300, $this->bowling->score());
    }

    /**
     * @dataProvider invalidRollProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidRollsException($pins)
    {
        $this->bowling->roll($pins);
    }

    protected function rollMany(int $count, int $pins)
    {
        for ($times = 1; $times <= $count; $times++) {
            $this->bowling->roll($pins);
        }
    }

    protected function rollSpare()
    {
        $this->bowling->roll(0);
        $this->bowling->roll(10);
    }

    protected function rollStrike()
    {
        $this->bowling->roll(10);
    }

    public function invalidRollProvider(): array
    {
        return [[11], [-3], [100]];
    }
}
