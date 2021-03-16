<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public static function sendSignupEmail($name,$email,$verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
    public function verifyUser(Request $request){
        
        $verification_code = $request['verification_code'];
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return view('auth.login')->with('message','Email Verified Successfully');
        }
    }   
}