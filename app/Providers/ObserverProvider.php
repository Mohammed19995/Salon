<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;


use App\Models\UserNotification;
use App\Observers\AdminObserver;
use App\Observers\CategoryObserver;
use App\Observers\CountryObserver;
use App\Observers\GalleryObserver;
use App\Observers\UserObserver;
use App\Observers\StateObserver;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Gallery::observe(GalleryObserver::class);
        User::observe(UserObserver::class);
        Admin::observe(AdminObserver::class);
        Category::observe(CategoryObserver::class);

    }
}
