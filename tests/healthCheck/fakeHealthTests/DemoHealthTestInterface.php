<?php

namespace healthCheck\tests\healthCheck\fakeHealthTests;


use healthCheck\interfaces\HealthTestInterface;

class DemoHealthTestInterface implements HealthTestInterface
{
    /** @var string|array */
    private $testResponse;
    private string $name;


    public function __construct($testResponse, string $name)
    {
        $this->testResponse = $testResponse;
        $this->name = $name;
    }

    public function getName(): string
    {
       return $this->name;
    }

    public function run()
    {
        return $this->testResponse;
    }
}