<?php

namespace healthCheck\interfaces;

interface HealthTest
{
    /**
     * @return array|string
     */
    public function run();

    public function getName(): string;
}