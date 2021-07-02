<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\File;


class GalleryObserver
{
    /**
     * Handle the gallery "created" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function created(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "updated" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function updated(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "deleted" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function deleted(Gallery $gallery)
    {
        File::delete(public_path()."/uploads/".$gallery->getRawOriginal('src'));

    }

    /**
     * Handle the gallery "restored" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function restored(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "force deleted" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function forceDeleted(Gallery $gallery)
    {
        //
    }
}
