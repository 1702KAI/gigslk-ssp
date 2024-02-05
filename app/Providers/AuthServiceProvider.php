<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('employer', function ($user) {
            return $user->role === 'employer';
        });
        Gate::define('freelancer', function ($user) {
            return $user->role === 'freelancer';
        });
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
