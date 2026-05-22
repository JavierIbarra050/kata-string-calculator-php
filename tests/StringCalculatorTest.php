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
    public function givenAnySingleNumberReturnsThatNumber()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('2');

        $this->assertEquals(2, $resultado);
    }

    /**
     * @test
     */
    public function givenNotNumericalArgumentReturns0()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('NotNumericalValue');

        $this->assertEquals(0, $resultado);
    }

    /**
     * @test
     */
    public function givenAnyAmountOfNumbersReturnSumOfThem()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1,1,1,1,1,1');

        $this->assertEquals(6, $resultado);
    }

    /**
     * @test
     */
    public function givenAnyAmountOfNumbersWithJumpLineBetweenReturnsSumOfNumbers()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1\n1\n1');

        $this->assertEquals(3, $resultado);
    }

    /**
     * @test
     */
    public function givenAnyAmountOfNumbersWithJumpLineAndComasBetweenReturnsSumOfNumbers()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1\n1,1');

        $this->assertEquals(3, $resultado);
    }

    /**
     * @test
     */
    public function givenAnyAmountOfNumbersWithADelimitadorReturnsSum()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('//;\n1;1;1;1');

        $this->assertEquals(4, $resultado);
    }

    /**
     * @test
     */
    public function givenStringWithMultipleNegativeNumberReturnsErrorAndNumbers()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1,-1,-1');

        $this->assertEquals("Negativos no soportados, " . -1 . ",". -1 , $resultado);
    }

    /**
     * @test
     */
    public function givenStringWithNumbersHigherThanOneThousandReturnsSumWithoutThatNumbers()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('1,1000,1');

        $this->assertEquals(2, $resultado);
    }

    /**
     * @test
     */
    public function givenStringWithDelimitadorMultipleReturnsSum()
    {
        $calculadora = new StringCalculator();

        $resultado = $calculadora->add('//[***]\n1***2***3');

        $this->assertEquals(6, $resultado);
    }
}
