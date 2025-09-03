<?php

namespace YumaIt\RandomToken\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use YumaIt\RandomToken\RandomTokenServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            RandomTokenServiceProvider::class,
        ];
    }
}
