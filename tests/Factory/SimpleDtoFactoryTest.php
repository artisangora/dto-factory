<?php

namespace DtoFactory\Test\Factory;

use DtoFactory\Dto\Address;
use DtoFactory\Dto\Person;
use DtoFactory\Factory\DtoFactory;
use DtoFactory\Factory\SimpleDtoFactory;
use PHPUnit\Framework\TestCase;

class SimpleDtoFactoryTest extends TestCase
{
    public function testInitialization()
    {
        $factory = new SimpleDtoFactory();
        $this->assertInstanceOf(DtoFactory::class, $factory);
    }

    public function testDtoCreatingProcess()
    {
        $data = [
            'country' => 'Russia',
            'city' => 'Kirov'
        ];

        $factory = new SimpleDtoFactory();
        /** @var Address $factoryAddress */
        $factoryAddress = $factory->create(Address::class, $data);

        $this->assertInstanceOf(Address::class, $factoryAddress);
    }

    public function testDataIsCorrect()
    {
        $data = [
            'country' => 'Russia',
            'city' => 'Kirov'
        ];

        $factory = new SimpleDtoFactory();
        /** @var Address $factoryAddress */
        $factoryAddress = $factory->create(Address::class, $data);

        $manualAddress = new Address($data['country'], $data['city']);

        $this->assertEquals($manualAddress->getCountry(), $factoryAddress->getCountry());
        $this->assertEquals($manualAddress->getCity(), $factoryAddress->getCity());
    }

    public function testNestedDtoDataIsCorrect()
    {
        $addressData = [
            'country' => 'Russia',
            'city' => 'Kirov'
        ];
        $personData = [
            'name' => '',
            'age' => 1,
            'address' => new Address($addressData['country'], $addressData['city'])
        ];

        $factory = new SimpleDtoFactory();
        /** @var Person $factoryPerson */
        $factoryPerson = $factory->create(Person::class, $personData);
        $manualPerson = new Person($personData['name'], $personData['age'], $personData['address']);

        $this->assertEquals($manualPerson->getName(), $factoryPerson->getName());
        $this->assertEquals($manualPerson->getAge(), $factoryPerson->getAge());
        $this->assertEquals($manualPerson->getAddress(), $factoryPerson->getAddress());
    }
}