<?php

namespace MathieuTu\LaravelOpenInEditor\Tests;

use MathieuTu\LaravelOpenInEditor\ServiceProvider;
use Orchestra\Testbench\TestCase;

class OpenInEditorTest extends TestCase
{
    /**
     * @dataProvider getEditors
     */
    public function testItRedirectToEditorWhenRouteIsCalled($editor, $url)
    {
        config(['app.editor' => $editor]);
        $this->get('__open-in-editor?file=foo.bar&line=134')->assertRedirect($url);
    }

    public function testItRedirectToEditorWithoutLine()
    {
        config(['app.editor' => 'phpstorm']);
        $this->get('__open-in-editor?file=foo.bar')->assertRedirect('phpstorm://open?file=foo.bar&line=0');
    }

    public function getEditors()
    {
        return [
            ['sublime', 'subl://open?url=file://foo.bar&line=134'],
            ['textmate', 'txmt://open?url=file://foo.bar&line=134'],
            ['emacs', 'emacs://open?url=file://foo.bar&line=134'],
            ['macvim', 'mvim://open/?url=file://foo.bar&line=134'],
            ['phpstorm', 'phpstorm://open?file=foo.bar&line=134'],
            ['idea', 'idea://open?file=foo.bar&line=134'],
            ['vscode', 'vscode://file/foo.bar:134'],
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.debug', true);
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}
