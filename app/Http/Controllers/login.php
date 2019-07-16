<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/3/2019
 * Time: 4:59 PM
 */

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\korisnik;

class login extends  Controller
{
    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loginUsername' => 'required|regex:/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/',
            'loginPassword' => 'required|regex:/^[\S]{6,25}$/'
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator, 'login')
                ->withInput();
        }else{
            $username=($request->input('loginUsername'));
            $password=md5($request->input('loginPassword'));

            $korisnik = new korisnik();
            try{
                $result=$korisnik->login($username,$password);
                if(count($result)>0){
                    session(array('user' => $result));
                    if(session('user')->first()->ulogaId==1){
                        return redirect('/products');
                    }
                    else{
                        return redirect('/');
                    }
                }else{
                    return redirect('/login');
                }
            }catch (mysqli_sql_exception $e){

            }



            return redirect('/');
        }

        // Store the blog post...
    }
}