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

        $user = User::where('email', 'mohamedosama12w32@gmail.com')->first();


        $rules = [
            'name' => ['required','min:2','max:60','not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required', 'email', 'regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,3}$/'],
            'subject' => ['required','min:2','max:60','not_regex:/([%\$#\*<>]+)/'],
            'message' => ['required','min:2','max:60','not_regex:/([%\$#\*<>]+)/']
        ];

        $this->validate($request, $rules);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($user->email)->send(new contact($name,$email,$subject,$message));

        return redirect()->route('contacts')->withStatus('your response has been sent successfully');

    }
}
