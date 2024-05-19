<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\RoleEnum;
use App\Models\Architect;
use App\Models\User;
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
        Gate::define('update-architect', function (User $user, Architect $architect) {
            return auth()->guard('architects')->check() && auth()->guard('architects')->user()->id === $architect->id;
        });

        Gate::define('is_architect', function () {
           return auth()->guard('architects')->check();
        });

        Gate::define('is_admin', fn(User $user) => $user->role === RoleEnum::ADMIN->value);

        Gate::define('registered', fn(User $user) => $user->role === RoleEnum::REGISTERED->value);
    }
}
