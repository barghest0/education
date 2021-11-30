<?php

use PHPUnit\Framework\TestCase;

final class Ex2Test extends TestCase
{
   

    public function testEquation()
    {
        $this->assertEquals(
            3871,
            Ex2::ex()
        );
    }
}
