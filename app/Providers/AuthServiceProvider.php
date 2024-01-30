<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Projcet;
use App\Models\Task;
use App\Policies\ProjectPolicy;
use App\Policies\TashPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Projcet::class=>ProjectPolicy::class,
        Task::class=>TashPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
