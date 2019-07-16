<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/3/2019
 * Time: 4:59 PM
 */

namespace App\Http\Controllers;

use App\Mail\ActivateAccount;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\korisnik;

class register extends  Controller
{
    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
            'lastName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
            'address' => 'required|regex:/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/',
            'phone' => 'required|regex:/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/',
            'email' => 'required|email',
            'username' => 'required|unique:korisnik,username|regex:/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/',
            'password' => 'required|regex:/^[\S]{6,25}$/'
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator, 'register')
                ->withInput();
        }else{
            $firstName=($request->input('firstName'));
            $lastName=($request->input('lastName'));
            $address=($request->input('address'));
            $phone=($request->input('phone'));
            $email=($request->input('email'));
            $username=($request->input('username'));
            $password=md5($request->input('password'));
            $vremeRegistrivanja=time();
            $aktivacioniKod=md5($vremeRegistrivanja.$email);

            $korisnik = new korisnik();
            $korisnik->register($firstName,$lastName,$email,$address,$phone,$username,$password,$vremeRegistrivanja,$aktivacioniKod);
            Mail::to($email)->send(new ActivateAccount($aktivacioniKod));
            return redirect('/login/Acctivate your account');
        }

        // Store the blog post...
    }
}