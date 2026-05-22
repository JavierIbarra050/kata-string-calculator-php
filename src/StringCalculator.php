<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int | string
    {
        if(!$numbers) return 0;

        if(!str_contains($numbers, ',') && !str_contains($numbers, '\n')) return (int) $numbers;

        if(str_contains($numbers, '//')){
            $numbers = str_replace('//', '', $numbers);
            $delimitador = explode('\n', $numbers)[0];

            $numbers = str_replace($delimitador . '\n', '', $numbers);

            $numbersList = explode($delimitador, $numbers);

            $sum = 0;
            $negativos = [];
            foreach($numbersList as $number){
                if(str_contains($number, '-')){
                    $negativos[] = $number;
                } else {
                    if($number < 1000) $sum += (int) $number;
                }
            }

            if(empty($negativos)) return $sum;

            $respuesta = "Negativos no soportados, ";

            for($i = 0; $i < count($negativos); $i++){
                $respuesta .= $negativos[$i];

                if($i != count($negativos) - 1){
                    $respuesta .= ',';
                }
            }

            return $respuesta;
        }

        if(str_contains($numbers, '\n')) $numbers = str_replace('\n', ',', $numbers);

        $numbersList = explode(',', $numbers);

        $sum = 0;
        $negativos = [];
        foreach($numbersList as $number){
            if(str_contains($number, '-')){
                $negativos[] = $number;
            } else {
                if($number < 1000) $sum += (int) $number;
            }
        }

        if(empty($negativos)) return $sum;

        $respuesta = "Negativos no soportados, ";

        for($i = 0; $i < count($negativos); $i++){
            $respuesta .= $negativos[$i];

            if($i != count($negativos) - 1){
                $respuesta .= ',';
            }
        }

        return $respuesta;
    }
}