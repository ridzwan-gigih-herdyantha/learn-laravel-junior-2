<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewsLetter;
use Illuminate\Http\Request;
use App\Mail\TestSendingEmail;
use App\Jobs\ProcessNewsletter;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index()
    {
        $users = User::all();
        Mail::to('client@gmail.com')->send(new TestSendingEmail($users));
    }
    public function sendNewsLetter()
    {
        $emails = User::pluck('email');
        // dd($emails);
        foreach ($emails as $email) {
            // Mail::to($email)->send(new NewsLetter());
            ProcessNewsletter::dispatch($email);
        }
        dd($emails);
    }
}
