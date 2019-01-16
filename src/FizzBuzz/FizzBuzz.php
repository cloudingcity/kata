<?php

declare(strict_types=1);

namespace Clouding\Kata\FizzBuzz;

class FizzBuzz
{
    /**
     * Execute a number.
     *
     * @param  int $number
     * @return int|string
     */
    public function execute(int $number)
    {
        if ($number % 15 === 0) {
            return 'fizzbuzz';
        }

        if ($number % 3 === 0) {
            return 'fizz';
        }

        if ($number % 5 === 0) {
            return 'buzz';
        }

        return $number;
    }

    /**
     * Execute up to a number.
     *
     * @param  int   $number
     * @return array
     */
    public function executeUpTo(int $number): array
    {
        return array_map(function (int $number) {
            return $this->execute($number);
        }, range(1, $number));
    }
}
