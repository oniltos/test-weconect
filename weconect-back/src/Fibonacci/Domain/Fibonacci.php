<?php

declare(strict_types=1);

namespace Fibonacci\Domain;

class Fibonacci {
    public function generate(int $n): array {
        $sequence = [];

        for ($i = 0; $i < $n; $i++) {
            if ($i === 0) {
                $sequence[] = 0;
            } elseif ($i === 1) {
                $sequence[] = 1;
            } else {
                $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
            }
        }

        return $sequence;
    }
}