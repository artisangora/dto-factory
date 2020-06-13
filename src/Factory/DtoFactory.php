<?php

namespace DtoFactory\Factory;

interface DtoFactory
{
    public function create(string $class, array $data);
}