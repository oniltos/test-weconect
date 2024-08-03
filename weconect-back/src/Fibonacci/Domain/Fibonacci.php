<?php

declare(strict_types=1);

namespace Fibonacci\Domain;

class Fibonacci {
    /**
     * Optimized version of fibonnaci generator function with time and space complexity O(n)
     * and memory efficiency by storing only the last two computed values when needed
     * 
     * @param mixed $n
     * @return int[]
     */
    public function generate($n)
    {
        if ($n <= 0) {
            return [];
        }

        if ($n == 1) {
            return [0];
        }

        $sequence = [0, 1];

        $a = 0;
        $b = 1;

        for ($i = 2; $i < $n; $i++) {
            $next = $a + $b;
            $sequence[] = $next;
            $a = $b;
            $b = $next;
        }

        return $sequence;
    }

    
}