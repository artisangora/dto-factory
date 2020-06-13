<?php

namespace DtoFactory\Test\Dto;

use DtoFactory\Dto\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testInitialization(): void
    {
        $expectedCountry = 'Russia';
        $expectedCity = 'Moscow';
        $address = new Address($expectedCountry, $expectedCity);

        $this->assertEquals($expectedCountry, $address->getCountry());
        $this->assertEquals($expectedCity, $address->getCity());
    }
}