<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        app('view')->composer('admin.layouts.master', function ($view) {
            $action = app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);

            $controller = str_replace('Controller', '', $controller);
            $view->with(compact('controller', 'action'));
        });

        app('view')->composer('front.layouts.master', function ($view) {
            $action = app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);

            $controller = str_replace('Controller', '', $controller);
            $view->with(compact('controller', 'action'));
        });

        app('view')->composer('student.layouts.master', function ($view) {
            $action = app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);

            $controller = str_replace('Controller', '', $controller);
            $view->with(compact('controller', 'action'));
        });

    }
}
