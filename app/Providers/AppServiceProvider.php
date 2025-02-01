<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.admin-navigation', function ($view) {
            $newMembersCount = User::where('status', 'Awaiting Approval')->count();
            $view->with('newMembersCount', $newMembersCount);
        });
    }
}
