<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
//        Schema::defaultStringLength(191);

        //Macro for searching through query results
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });

        //Validator rule to accept alphabets with spaces, and maybe hyphen
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // To only accept alpha and spaces use: /^[\pL\s]+$/u
            // To accept hyphens use: /^[\pL\s-]+$/u
            return preg_match('/^[\pL\s-]+$/u', $value);
        });

        //Use Bootstrap for pagination views
        Paginator::useBootstrap();

        /*
        * Paginate a collection
        *
        * @param int $perPage
        * @param int $total
        * @param int $page
        * @param string $pageName
        * @return array
        */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName
                ]
            );
        });

        // Force SSL in production
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }
    }
}
