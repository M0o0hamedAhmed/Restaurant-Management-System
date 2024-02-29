<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $notifications_count = Order::query()->where('status','pending')->count();
            $notifications = Order::query()->LatestPending()->get();
            $view->with(compact('notifications_count','notifications'));
        });
    }
}
