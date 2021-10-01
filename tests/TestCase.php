<?php

namespace MoneyPag\JsValidation\Tests;

use MoneyPag\JsValidation\JsValidationServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [JsValidationServiceProvider::class];
    }
}