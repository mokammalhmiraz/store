<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index(){

        $mailData = [
            'title' => 'Mail from Miraz',
            'body' => 'This is for testing email using smtp',
        ];

        Mail::to('m.h.miraz26@gmail.com')->send(new DemoMail($mailData));

        dd('Email send successfully.');
    }
}
