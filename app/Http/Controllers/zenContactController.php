<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Events\ContactEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\SendOtpMail;

class zenContactController extends Controller
{
    public function contact(Request $request){
          $x= $request->validate([
            'full_name' => 'required|string',
            'business_email' => 'required|email',
            'phone_number'=>'required|numeric',
            'message'=>'required|string'
        ], [
             'full_name.required' => 'Full name is required.',
            'full_name.string' => 'Full name must be a string.',
     
           'business_email.required' => 'Email address is required.',
            'business_email.email' => 'Email address must be a valid email format.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.numeric' => 'Phone number must be numeric.',
             'message.required' => 'The message field is required',
              'message.string' => ' The messagee must be a string.',
        ]);
        
      if (empty($x)) {
                     return redirect('/contact')->with('error', 'access error occurred.');
                      }

      event(new \App\Events\ContactEvent($x));

        return redirect('/contact')->with('success','We have received your inquiry and will respond to it as soon as possible. Thank you.');

    }

     public function lang($lang){
           if(in_array($lang, ['ar', 'en'])) {
        if(auth()->user()) {
            $user = auth()->user();
            $user->lang = $lang;
            $user->save();
        } else {
            if(session()->has('lang')) {
                session()->forget('lang');
            }
            session()->put('lang', $lang);
        }
    } else {
        if(auth()->user()) {
            $user = auth()->user();
            $user->lang = 'en';
            $user->save();
        } else {
            if(session()->has('lang')) {
                session()->forget('lang');
            }
            session()->put('lang', 'en');
        }
    }
    return back();

     }





}
