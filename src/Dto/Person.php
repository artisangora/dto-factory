<?php

namespace DtoFactory\Dto;

class Person
{
    private $name;
    private $age;
    private $address;

    public function __construct(string $name, int $age, ?Address $address = null)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }


}