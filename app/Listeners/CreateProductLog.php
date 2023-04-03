<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Models\ProductLogActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProductLog
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
     * @param  \App\Events\ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        ProductLogActivity::create([
            'description' => 'create user ' .$event->product->name
        ]);
    }
}
