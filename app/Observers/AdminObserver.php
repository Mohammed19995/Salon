<?php

namespace App\Observers;

use App\Models\Admin;

// facades
use App\Facades\FileFacade;

class AdminObserver
{
    /**
     * Handle the admin "created" event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function created(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "updated" event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function updated(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "deleted" event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function deleted(Admin $admin)
    {
        $admin->update(['image_id' => null]);
    }

    /**
     * Handle the admin "restored" event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function restored(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function forceDeleted(Admin $admin)
    {
        //
    }
}
