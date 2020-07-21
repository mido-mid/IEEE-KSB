<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\contact;

use App\User;

class ContactController extends Controller
{
    //

    public function index()
    {

        return view('contact');
    }


    public function send(Request $request)
    {

        $user = User::where('admin', 1)->first();


        $rules = [
            'name' => 'required|string|min:5|max:40',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:40',
            'message' => 'required|string',
        ];

        $this->validate($request, $rules);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($user->email)->send(new contact($name,$email,$subject,$message));

        return view('contact');

    }
}
