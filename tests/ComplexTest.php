<?php

namespace App\Tests;

use App\Complex;
use PHPUnit\Framework\TestCase;

/**
 * @covers Complex
 */
class ComplexTest extends TestCase
{
    function testConstructor() {
        $complex = new Complex(1.5, 1.6);
        $this->assertEquals(1.5, $complex->getRe());
        $this->assertEquals(1.6, $complex->getIm());
    }

    /**
     * @dataProvider addDataProvider
     */
    function testAdd(Complex $a, Complex $b, $expected) {
        $c = $a->add($b);
        $this->assertEquals($expected, $c);
    }
    function addDataProvider(): array
    {
        return [
            [
                new Complex(24.54, 232.64),
                new Complex(30.64, 202),
                new Complex(55.18, 434.64)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(0, 0),
                new Complex(24.54, 232.64)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(-24.54, -232.64),
                new Complex(0, 0),
            ],
        ];
    }

    /**
     * @dataProvider subDataProvider
     */
    function testSub(Complex $a, Complex $b, $expected) {
        $c = $a->Sub($b);
        $this->assertEquals($expected, $c);
    }

    function subDataProvider(): array
    {
        return [
            [
                new Complex(24.54, 232.64),
                new Complex(30.64, 202),
                new Complex(-6.1, 30.64)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(0, 0),
                new Complex(24.54, 232.64)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(24.54, 232.64),
                new Complex(0, 0),
            ],
        ];
    }

    /**
     * @dataProvider multiplyDataProvider
     */
    public function testMultiply(Complex $a, Complex $b, $expected) {
        $c = $a->multiply($b);
        $this->assertEquals($expected, $c);
    }

    function multiplyDataProvider(): array
    {
       return [
           [
               new Complex(24.54, 232.64),
               new Complex(30.64, 202),
               new Complex(-46241.3744, 12085.1696)
           ],
           [
               new Complex(24.54, 232.64),
               new Complex(-1, 0),
               new Complex(-24.54, -232.64),
           ],
           [
               new Complex(30.64, 202),
               new Complex(24.54, 232.64),
               new Complex(-46241.3744, 12085.1696)
           ],
           [
               new Complex(24.54, 232.64),
               new Complex(0, 0),
               new Complex(0, 0)
           ],
           [
               new Complex(24.54, 232.64),
               new Complex(1, 0),
               new Complex(24.54, 232.64)
           ],
       ];
    }

    public function testDivideZero() {
        $a = new Complex(24.54, 232.64);
        $b = new Complex(0, 0);
        $this->expectException(\DivisionByZeroError::class);
        $a->divide($b);
    }

    /**
     * @dataProvider divideDataProvider
     */
    public function testDivide(Complex $a, Complex $b, $expected) {
        $c = $a->divide($b);
        $this->assertEquals($expected, $c);
    }

    function divideDataProvider(): array
    {
        return [
            [
                new Complex(-46241.3744, 12085.1696),
                new Complex(24.54, 232.64),
                new Complex(30.64, 202)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(-1, 0),
                new Complex(-24.54, -232.64),
            ],
            [
                new Complex(-46241.3744, 12085.1696),
                new Complex(30.64, 202),
                new Complex(24.54, 232.64)
            ],
            [
                new Complex(0, 0),
                new Complex(24.54, 232.64),
                new Complex(0, 0)
            ],
            [
                new Complex(24.54, 232.64),
                new Complex(1, 0),
                new Complex(24.54, 232.64)
            ],
        ];
    }
}
