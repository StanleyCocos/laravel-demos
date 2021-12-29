<?php

namespace App\Listeners;

use App\Events\ImageView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ImageViewNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ImageView  $event
     * @return void
     */
    public function handle(ImageView $event)
    {
        //
    }
}
