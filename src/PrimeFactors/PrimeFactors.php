<?php

declare(strict_types=1);

namespace Clouding\Kata\PrimeFactors;

class PrimeFactors
{
    /**
     * Generate number of prime factors
     *
     * @param  int   $number
     * @return array
     */
    public static function generate(int $number): array
    {
        $primes = [];

        for ($candidate = 2; $number > 1; $candidate++) {
            while ($number % $candidate === 0) {
                $primes[] = $candidate;
                $number /= $candidate;
            }
        }

        return $primes;
    }
}
