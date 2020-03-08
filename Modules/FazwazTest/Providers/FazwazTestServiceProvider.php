<?php

namespace Modules\FazwazTest\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class FazwazTestServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('FazwazTest', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('FazwazTest', 'Config/config.php') => config_path('fazwaztest.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('FazwazTest', 'Config/config.php'), 'fazwaztest'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/fazwaztest');

        $sourcePath = module_path('FazwazTest', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/fazwaztest';
        }, \Config::get('view.paths')), [$sourcePath]), 'fazwaztest');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/fazwaztest');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'fazwaztest');
        } else {
            $this->loadTranslationsFrom(module_path('FazwazTest', 'Resources/lang'), 'fazwaztest');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('FazwazTest', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
