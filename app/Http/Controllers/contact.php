<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/8/2019
 * Time: 5:49 PM
 */

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;

class contact
{
    public function sendMessage(Request $request){
            $validator = Validator::make($request->all(), [
                'firstName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
                'lastName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
                'email' => 'required|email',
                'subject'=>'required|regex:/^[A-Za-z0-9\s\.\,]+$/',
                'message'=>'required|regex:/^[A-Za-z0-9\s\.\,]+$/',
            ]);

            if ($validator->fails()) {
                return redirect('/login')
                    ->withErrors($validator, 'register')
                    ->withInput();
            }else{
                $firstName=($request->input('firstName'));
                $lastName=($request->input('lastName'));
                $email=($request->input('email'));
                $naslov=($request->input('subject'));
                $message=($request->input('message'));

                Mail::to('stefan.stankovic.97.16@ict.edu.rs')->send(new contactMail($firstName,$lastName,$email,$naslov,$message));
                return redirect('contact/Your mail is sent to the administrator!');
            }

            // Store the blog post...

    }
}