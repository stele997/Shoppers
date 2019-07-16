<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/7/2019
 * Time: 9:46 PM
 */

namespace App\Http\Controllers;


use App\Models\narudzbina;
use App\Models\proizvod;
use Validator;
use Illuminate\Http\Request;

class order
{
    public function naruci(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
            'lastName' => 'required|regex:/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/',
            'address' => 'required|regex:/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/',
            'phone' => 'required|regex:/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect('/checkout')
                ->withErrors($validator, 'register')
                ->withInput();
        }else{
            $firstName=($request->input('firstName'));
            $lastName=($request->input('lastName'));
            $address=($request->input('address'));
            $phone=($request->input('phone'));
            $email=($request->input('email'));
            $vremePorudzbine=time();

            $korisnikId=session('user')->first()->korisnikId;
            $narudzbine = session('cart');
            $narudzbina=new narudzbina();
            foreach ($narudzbine as $item){

                $proizvodId=$item[0]->proizvodId;
                $cena=$item[0]->cena;
                $kolicina=$item['kolicina'];
                $narudzbina->ubaciNarudzbinu($korisnikId,$firstName,$lastName,$address,$email,$phone,$vremePorudzbine,$proizvodId,$cena,$kolicina);
                session()->forget('cart');
            }
            return redirect('/');
        }

        // Store the blog post...
    }
}