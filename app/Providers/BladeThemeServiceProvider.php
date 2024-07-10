<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/blade-components.php', 'blade-components');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    private function bootResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'blade-components');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('blade-components.components', []) as $name => $component) {
                $blade->component($name, $component['class']);
            }
        });
    }

    private function bootPublishing(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../../config/blade-components.php' => $this->app->configPath('blade-components.php'),
        ], 'blade-components');

        $this->publishes([
            __DIR__ . '/../../resources/views' => $this->app->resourcePath('views/vendor/blade-components'),
        ], 'blade-components-views');
    }
}
