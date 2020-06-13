<?php

namespace DtoFactory\Test\Dto;

use DtoFactory\Dto\Address;
use DtoFactory\Dto\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testInitialization(): void
    {
        $expectedCountry = 'Russia';
        $expectedCity = 'Moscow';
        $address = new Address($expectedCountry, $expectedCity);

        $expectedName = 'Boris';
        $expectedAge = 40;
        $person = new Person($expectedName, $expectedAge, $address);

        $this->assertEquals($expectedName, $person->getName());
        $this->assertEquals($expectedAge, $person->getAge());
        $this->assertEquals($address, $person->getAddress());
    }
}