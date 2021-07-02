<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AdminRoleProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {

        Blade::if('check_role' , function($role) {
            return checkAdminRole($role);
        });

    }
}
