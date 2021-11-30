<?php

use PHPUnit\Framework\TestCase;

final class Ex3Test extends TestCase
{
   
    public function testValidData()
    {
        $this->assertInstanceOf(
            Ex3::class,
            Ex3::validData('string')
        );
    }

    public function testEquation()
    {
        $this->assertEquals(
            2,
            Ex3::ex('abaaba')
        );
    }
}
