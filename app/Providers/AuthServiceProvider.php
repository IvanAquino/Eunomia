<?php

namespace App\Providers;

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

        Gate::define('users-read', function ($user) {
            return $user->isAbleTo('users-read');
        });
        Gate::define('clients-read', function ($user) {
            return $user->isAbleTo('clients-read');
        });
        Gate::define('projects-read', function ($user) {
            return $user->isAbleTo('projects-read');
        });
    }
}
