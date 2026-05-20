<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function givenEmptyStringReturns0()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('');

        $this->assertEquals(0, $resultado);
    }

    /**
     * @test
     */
    public function givenNumberOneReturnsNumberOne()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1');

        $this->assertEquals(1, $resultado);
    }

    /**
     * @test
     */
    public function givenAnyNumberReturnsThatNumber()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('2');

        $this->assertEquals(2, $resultado);
    }
}