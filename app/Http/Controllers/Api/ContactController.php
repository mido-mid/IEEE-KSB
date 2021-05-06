<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\contact;

use App\User;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    use GeneralTrait;

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

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return $this->returnValidationError(422, $validator);
        }

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($user->email)->send(new contact($name,$email,$subject,$message));

        return $this->returnSuccessMessage('your message has been sent successfully',200);

    }
}
