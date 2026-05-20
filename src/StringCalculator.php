<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if(!$numbers) return 0;

        if(!str_contains($numbers, ',') && !str_contains($numbers, '\n')) return (int) $numbers;

        if(str_contains($numbers, '//')){
            $numbers = str_replace('//', '', $numbers);
            $delimitador = explode('\n', $numbers)[0];

            $numbers = str_replace($delimitador . '\n', '', $numbers);

            $numbersList = explode($delimitador, $numbers);

            return (int) $numbersList[1];
        }

        if(str_contains($numbers, '\n')) $numbers = str_replace('\n', ',', $numbers);

        $numbersList = explode(',', $numbers);

        $sum = 0;

        foreach ($numbersList as $number) {
            $sum += (int) $number;
        }

        return $sum;
    }
}