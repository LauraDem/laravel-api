<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageFormController extends Controller
{
    public function store() {
        
        $destinatario = Auth::user()->email;
        Mail::to($destinatario)->send(new NewMessage());

    }
}
