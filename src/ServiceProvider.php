<?php

namespace MathieuTu\LaravelOpenInEditor;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use ReflectionMethod;
use Whoops\Handler\PrettyPageHandler;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        if ($this->app['config']->get('app.debug')) {
            $this->app['router']->get('/__open-in-editor', function (Request $request) {
                return redirect($this->getEditorLink($request->input('file'), $request->input('line', 0)));
            });
        }
    }

    protected function getEditorLink($file, $line = 0)
    {
        return $this->getWhoopsPrettyHandler()->getEditorHref($file, $line);
    }

    protected function getWhoopsPrettyHandler(): PrettyPageHandler
    {
        return tap(new ReflectionMethod(Handler::class, 'whoopsHandler'))
            ->setAccessible(true)
            ->invoke($this->app[ExceptionHandler::class]);
    }
}
