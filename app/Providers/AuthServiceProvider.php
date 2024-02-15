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
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 権限の定義
        Gate::define('manage-users', function ($user) {
            return $user->user_role === '管理者';
        });
        Gate::define('edit-users', function ($user) {
            return in_array($user->user_role, ['管理者', '編集']);
        });
        Gate::define('view-users', function ($user) {
            return in_array($user->user_role, ['管理者', '編集', '閲覧']);
        });
    }
}
