<?php

namespace healthCheck;

use healthCheck\interfaces\HealthTest;

class HealthCheck
{
    /** @var HealthTest[] */
    private array $tests = [];

    public function addTest(HealthTest $test)
    {
        $this->tests[] = $test;
    }

    public function run(string $testName = ''): string
    {
        $result = [];

        if (empty($this->tests)) {
            return json_encode('Any test is not set');
        }

        foreach ($this->tests as $test) {
            if (empty($testName) || $testName === $test->getName()) {
                $result[$test->getName()] = $test->run();
            }
        }
        return json_encode($result);
    }

}