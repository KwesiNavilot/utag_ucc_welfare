<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //this gate authorizes request approvals. Only the president can approve requests
        Gate::define('approve-request', function (Admin $admin) {
            return $admin->role === 'president';
        });

        //this gate authorizes the addition of executives. Only the president can add executives
        Gate::define('add-executives', function (Admin $admin) {
            return $admin->role === 'president';
        });

        //this gate authorizes the addition of members. Only the president and secretary can add executives
        Gate::define('add-members', function (Admin $admin) {
            return $admin->role === 'president' || $admin->role === 'secretary' || $admin->role === 'webmaster';
        });

        //this gate authorizes the creation of broadcasts when members want their requests to be published
        //Only the secretary can add create broadcasts
        Gate::define('create-broadcast', function (Admin $admin) {
            return $admin->role === 'secretary';
        });
    }
}
