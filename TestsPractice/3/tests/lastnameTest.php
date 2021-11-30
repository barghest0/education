<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;

final class LastnameTest extends TestCase
{

    public function testValidData()
    {
        $this->assertInstanceOf(
            Lastname::class,
            Lastname::validData('Иванов')
        );
    }

    public function testCorrectName()
    {
        $this->assertEquals(
            'Иванов',
            Lastname::getLastName(Lastname::add('Иванов'))
        );
    }
}
