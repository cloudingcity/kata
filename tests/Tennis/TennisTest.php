<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\Tennis;

use Clouding\Kata\Tennis\Player;
use Clouding\Kata\Tennis\Tennis;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function provider()
    {
        return [
            [['Pei', 0], ['Jack', 0], 'Love-All'],
            [['Pei', 1], ['Jack', 0], 'Fifteen-Love'],
            [['Pei', 2], ['Jack', 0], 'Thirty-Love'],
            [['Pei', 3], ['Jack', 0], 'Forty-Love'],
            [['Pei', 4], ['Jack', 0], 'Win for Pei'],
            [['Pei', 0], ['Jack', 4], 'Win for Jack'],
            [['Pei', 4], ['Jack', 3], 'Advantage Pei'],
            [['Pei', 3], ['Jack', 3], 'Deuce'],
            [['Pei', 8], ['Jack', 8], 'Deuce'],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testScore($player1, $player2, $expected)
    {
        $player1 = mock(Player::class, $player1);
        $player2 = mock(Player::class, $player2);
        $tennis = new Tennis($player1, $player2);

        $this->assertSame($expected, $tennis->score());
    }
}
