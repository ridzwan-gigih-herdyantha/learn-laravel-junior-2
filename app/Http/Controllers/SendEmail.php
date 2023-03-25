<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestSendingEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendEmail extends Controller
{
    public function index()
    {
        $users = User::all();
        Mail::to('client@gmail.com')->send(new TestSendingEmail($users));
    }
}
