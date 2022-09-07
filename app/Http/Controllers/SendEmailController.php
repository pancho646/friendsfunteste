<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;
use App\Mail\FriendsNotifyMail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    //
    public function sendEmail(Request $request ){
        $perfil="hola";
        $valid="hola";
       $details=[
            'title'=>"Correo de prueba".$request->user()->password,
            'body'=>" este es el cuerpo del correo"
        ];
        //General Mail::to($request->user())->send(new MailableClass);
        Mail::to($request->user())->send(new SaltlakeMailable($details));
        return view('home',compact('perfil','valid'));

        
    }
}
