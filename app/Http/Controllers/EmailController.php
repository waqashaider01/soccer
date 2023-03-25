<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{
    public function mailtest()
    {
        $mailData = [
            'title' => 'Mail from Joker',
            'body'  => 'This is for testing email using smtp.'
        ];

        Mail::to('iomer6637@gmail.com')->send(new DemoMail($mailData));
    }
}
