<?php

namespace App\Observers;

use App\Models\User;

// facades
use App\Facades\FileFacade;

use Illuminate\Http\Request;

class UserObserver
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function created(User $user)
    {

    }


    public function updating(User $user)
    {

    }


    public function deleted(User $user)
    {
        $user->update(['image_id' => null]);
    }

   
    public function restored(User $user)
    {
        //
    }


    public function forceDeleted(User $user)
    {
        //
    }
}
