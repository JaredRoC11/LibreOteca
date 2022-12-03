<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Policies\TeamPolicy;
use App\Policies\libroPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Libro::class => libroPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('crear-libro', function (User $user){
            return $user->id == '1' and $user->email == 'admin@admin.com';
        });

        Gate::define('crear-autor', function (User $user){
            return $user->id == '1' and $user->email == 'admin@admin.com';
        });
    }
}
