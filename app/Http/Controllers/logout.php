<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/4/2019
 * Time: 12:00 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class logout
{
    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect("/");
    }
}