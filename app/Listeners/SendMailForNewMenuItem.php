<?php

namespace App\Listeners;

use App\Events\NewMenuItem;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailForNewMenuItem
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewMenuItem $event): void
    {
        $menuItem =  $event->menuItem;
        $user = Auth::user();
        Mail::to($user->email)->send(new \App\Mail\NewMenuItem($user));


    }
}
