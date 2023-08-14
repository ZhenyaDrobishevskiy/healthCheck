<?php

//require_once __DIR__ . "/../../vendor/autoload.php";

namespace healthCheck\tests\healthCheck;

use healthCheck\HealthCheck;
use healthCheck\tests\healthCheck\fakeHealthTests\DemoHealthTestInterface;
use PHPUnit\Framework\TestCase;

class HealthCheckTest extends TestCase
{

    /**
     * @covers HealthCheck::run
     */
    public function testRunEmptyTests()
    {
        $healthCheck = new HealthCheck();
        $result = $healthCheck->run();

        $this->assertEquals('"Any test is not set"', $result);
    }

    /**
     * @covers HealthCheck::addTest
     * @covers HealthCheck::run
     */
    public function testRunAllTests()
    {
        $healthCheck = new HealthCheck();
        $healthTest1 = new DemoHealthTestInterface('Demo Test 1', 'Demo 1');
        $healthTest2 = new DemoHealthTestInterface('Demo Test 2', 'Demo 2');
        $healthTest3 = new DemoHealthTestInterface(['test info' => 'some info', 'details' => 'some details'], 'Demo 3');
        $healthCheck->addTest($healthTest1);
        $healthCheck->addTest($healthTest2);
        $healthCheck->addTest($healthTest3);

        $result = $healthCheck->run();
        $this->assertEquals('{"Demo 1":"Demo Test 1","Demo 2":"Demo Test 2","Demo 3":{"test info":"some info","details":"some details"}}', $result);
    }

    /**
     * @covers HealthCheck::addTest
     * @covers HealthCheck::run
     */
    public function testSelectTestByName()
    {
        $healthCheck = new HealthCheck();
        $healthTest1 = new DemoHealthTestInterface('Demo Test 1', 'Demo 1');
        $healthTest2 = new DemoHealthTestInterface('Demo Test 2', 'Demo 2');
        $healthTest3 = new DemoHealthTestInterface('Demo Test 3', 'Demo 3');
        $healthCheck->addTest($healthTest1);
        $healthCheck->addTest($healthTest2);
        $healthCheck->addTest($healthTest3);

        $result = $healthCheck->run('Demo 2');
        $this->assertEquals('{"Demo 2":"Demo Test 2"}', $result);
    }

}