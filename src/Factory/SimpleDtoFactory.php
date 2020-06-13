<?php

namespace DtoFactory\Factory;

use ReflectionClass;

class SimpleDtoFactory implements DtoFactory
{
    public function create(string $class, array $data): object
    {
        try {
            $refClass = new ReflectionClass($class);
        } catch (\ReflectionException $e) {
            throw new \InvalidArgumentException('Class not found');
        }
        $reflectionParameters = $refClass->getConstructor()->getParameters();

        $parametersForConstructor = [];
        foreach ($reflectionParameters as $parameter) {
            /** @var \ReflectionParameter $parameter */
            $paramName = $parameter->name;
            if (array_key_exists($paramName, $data)) {
                $parametersForConstructor[] = $data[$paramName];
            } else if($parameter->isOptional()) {
                $parametersForConstructor[] = $parameter->getDefaultValue();
            }
        }

        return new $class(...$parametersForConstructor);
    }
}