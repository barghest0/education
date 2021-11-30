<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{

    public function testCanBeCreatedFromValidEmail()
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@ex.com')
        );
    }

    public function testCanontBeCreatedFromInvalidEmail()
    {
        $this->expectException(InvalidArgumentException::class);
        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@ex.com',
            Email::fromString('user@ex.com')
        );
    }
}
