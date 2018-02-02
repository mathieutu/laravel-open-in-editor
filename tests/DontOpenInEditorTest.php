<?php

namespace MathieuTu\LaravelOpenInEditor\Tests;

use MathieuTu\LaravelOpenInEditor\ServiceProvider;
use Orchestra\Testbench\TestCase;

class DontOpenInEditorTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.debug', false);
    }
    public function testItDoesNothingIfAppIsNotInDebuggingMode()
    {
        $this->get('__open-in-editor?file=foo.bar')->assertStatus(404);
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}
