<?php

namespace healthCheck\tests\healthCheck\fakeHealthTests;


use healthCheck\interfaces\HealthTest;

class DemoHealthTest implements HealthTest
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