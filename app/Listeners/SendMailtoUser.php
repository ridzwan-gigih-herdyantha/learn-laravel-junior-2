<?php

namespace App\Listeners;

use App\Models\Product;
use App\Events\ProductCreated;
use App\Mail\TestSendingEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailtoUser
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
        $product = Product::all();
        Mail::to('client@gmail.com')->send(new TestSendingEmail($product));
    }
}
