<?php

use PHPUnit\Framework\TestCase;

final class Ex1Test extends TestCase
{
    public function testValidData()
    {
        $this->assertInstanceOf(
            Ex1::class,
            Ex1::validData(1)
        );
    }

    public function testEquation()
    {
        $this->assertEquals(
            14,
            Ex1::ex(4)
        );
    }
}
