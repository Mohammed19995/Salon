<?php

namespace App\Observers;

use App\Models\State;

class StateObserver
{
    /**
     * Handle the state "created" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function created(State $state)
    {
        //
    }

    /**
     * Handle the state "updated" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function updated(State $state)
    {
        //
    }

    /**
     * Handle the state "deleted" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function deleted(State $state)
    {
        $state->cities()->delete();
    }

    /**
     * Handle the state "restored" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function restored(State $state)
    {
        //
    }

    /**
     * Handle the state "force deleted" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function forceDeleted(State $state)
    {
        //
    }
}
