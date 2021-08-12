<?php

namespace App\Observers;

use App\Models\UserWorkingTime;
use Carbon\Carbon;

class UserWorkingTimeObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\UserWorkingTime $userWorkingTime
     * @return void
     */
    public function created(UserWorkingTime $userWorkingTime)
    {
        //
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\UserWorkingTime $userWorkingTime
     * @return void
     */
    public function updated(UserWorkingTime $userWorkingTime)
    {
        $userWorkingTime->user->update(['updated_at' => Carbon::now()]);
        $userWorkingTime->user->touch();
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\UserWorkingTime $userWorkingTime
     * @return void
     */
    public function deleted(UserWorkingTime $userWorkingTime)
    {
        
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\UserWorkingTime $userWorkingTime
     * @return void
     */
    public function restored(UserWorkingTime $userWorkingTime)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\UserWorkingTime $userWorkingTime
     * @return void
     */
    public function forceDeleted(UserWorkingTime $userWorkingTime)
    {
        //
    }
}
