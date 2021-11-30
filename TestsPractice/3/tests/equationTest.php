<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{

    public function testValidData()
    {
        $this->assertInstanceOf(
            Equation::class,
            Equation::validData(1, 1, 1)
        );
    }

    public function testCorrectRoots()
    {

        $this->assertEquals(
            [2, -0.25],
            Equation::roots(4, -7, -2)
        );
    }
}
