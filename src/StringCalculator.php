<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if(!$numbers) return 0;

        if(!str_contains($numbers, ',')) return (int) $numbers;

        $numbersList = explode(',', $numbers);
        return ((int) $numbersList[1]);
    }
}