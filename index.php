<?php

use DtoFactory\Dto\Address;
use DtoFactory\Dto\Person;
use DtoFactory\Factory\SimpleDtoFactory;

require_once 'vendor/autoload.php';

$data = [
    'address' => new Address('Ukraine', 'Kyiv'),
    'name' => 'Smith',
    'age' => 56
];

$hydrator = new SimpleDtoFactory();

$s1 = testSpeed(function () use ($hydrator, $data) {
    $dto1 = $hydrator->create(Person::class, $data);
});
$s2 = testSpeed(function () use ($hydrator, $data) {
    $dto2 = new Person($data['name'], $data['money']);
});


function testSpeed(Closure $closure) {
    $repeatTimes = 1000;
    $start = microtime(true);
    for ($i = 0; $i < $repeatTimes; $i++) {
        $closure();
    }
    $stop = microtime(true);
    return $stop - $start;
}

var_dump($data, $s1, $s2);