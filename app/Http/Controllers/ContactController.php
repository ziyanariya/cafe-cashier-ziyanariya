<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('index');
    }

    public function mail(Request $_request)
    {
        $details = [
            'name' => $_request->name,
            'email' => $_request->email,
            'message' => $_request->message

        ];

         Mail::to('yaya@gmail.com')->send(new ContactMail());

         return back()->with('message_sent', 'Pesan Anda telah terkirim');
    }
}
