<?php

namespace App\Observers;

use App\Models\UserCategory;
use Carbon\Carbon;

class UserCategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\UserCategory $userCategory
     * @return void
     */
    public function created(UserCategory $userCategory)
    {
        //
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\UserCategory $userCategory
     * @return void
     */
    public function updated(UserCategory $userCategory)
    {
        $userCategory->user->update(['updated_at' => Carbon::now()]);
        $userCategory->user->touch();
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\UserCategory $userCategory
     * @return void
     */
    public function deleted(UserCategory $userCategory)
    {
        
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\UserCategory $userCategory
     * @return void
     */
    public function restored(UserCategory $userCategory)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\UserCategory $userCategory
     * @return void
     */
    public function forceDeleted(UserCategory $userCategory)
    {
        //
    }
}
