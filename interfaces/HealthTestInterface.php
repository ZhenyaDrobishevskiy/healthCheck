<?php

namespace healthCheck\interfaces;

interface HealthTestInterface
{
    /**
     * @return array|string
     */
    public function run();

    public function getName(): string;
}