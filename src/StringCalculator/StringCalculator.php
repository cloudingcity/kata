<?php

declare(strict_types=1);

namespace Clouding\Kata\StringCalculator;

class StringCalculator
{
    /**
     * Max number allowed.
     *
     * @var int
     */
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * Add number string turn sum of numbers.
     *
     * @param  string $string
     * @return int
     */
    public function add(string $string): int
    {
        $numbers = $this->parseNumbers($string);

        return array_sum($this->filterNumbers($numbers));
    }

    /**
     * Parse number string.
     *
     * @param  string $string
     * @return array
     */
    protected function parseNumbers(string $string): array
    {
        return preg_split('/\\s*(,|\\\\n)\\s*/', $string);
    }

    /**
     * Filter invalid numbers.
     *
     * @param  array $numbers
     * @return array
     */
    protected function filterNumbers(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            $this->guardAgainstInvalidNumber($number);

            return $number < static::MAX_NUMBER_ALLOWED;
        });
    }

    /**
     * Guard against invalid number.
     *
     * @param $number
     */
    protected function guardAgainstInvalidNumber($number)
    {
        if ($number < 0) {
            throw new \InvalidArgumentException();
        }
    }
}
