<?php
/**
 * Part of the Laravel Bootstrap package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2022, Coder Studios Ltd
 *
 * @see       https://coderstudios.com
 */

namespace CoderStudios\LaravelBootstrap;

use Illuminate\Support\ServiceProvider;

class LaravelBootstrapServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        require 'Helpers/Helper.php';

        $this->registerRoutes();

        $this->publishes([
            __DIR__.'/../config/laravel-bootstrap.php' => config_path('laravel-bootstrap.php'),
        ], 'config');

        $this->commands([
            Commands\DBBackup::class,
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Register the package routes.
     */
    protected function registerRoutes()
    {
    }

    /**
     * Setup the configuration.
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-bootstrap.php',
            'laravel-bootstrap'
        );
    }
}
