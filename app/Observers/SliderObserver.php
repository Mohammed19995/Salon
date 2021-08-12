<?php

namespace App\Observers;

use App\Models\Slider;

class SliderObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Slider $slider
     * @return void
     */
    public function created(Slider $slider)
    {
        //
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Slider $slider
     * @return void
     */
    public function updated(Slider $slider)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\Slider $slider
     * @return void
     */
    public function deleted(Slider $slider)
    {
        $slider->update(['image_id' => null]);
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\Slider $slider
     * @return void
     */
    public function restored(Slider $slider)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\Slider $slider
     * @return void
     */
    public function forceDeleted(Slider $slider)
    {
        //
    }
}
