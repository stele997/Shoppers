<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/3/2019
 * Time: 6:40 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class korisnik
{
    public function register($ime, $prezime,$email, $adresa, $telefon,  $username, $password, $vremeRegistracije, $aktivacioniKod ){
        DB::table('korisnik')->insert(['ime'=>$ime,'prezime'=>$prezime,'email'=>$email,'adresa'=>$adresa,'telefon'=>$telefon,'username'=>$username,
            'password'=>$password,'vremeRegistracije'=>$vremeRegistracije,'aktivacioniKod'=>$aktivacioniKod,'ulogaid'=>'2']);
    }

    public function login($username, $password){
        return DB::table('korisnik')
            ->where([
            ['username',$username],
            ['password',$password],
                ['aktivan', 1],
        ])->get();
    }
    public function acctivate($aktivacioniKod){
        DB::table('korisnik')->where('aktivacioniKod','=',$aktivacioniKod)->update(['aktivan' => 1]);
    }

    public function getAll(){
        return DB::table('korisnik')->get();
    }
    public function getOne($id){
        return DB::table('korisnik')->where(['korisnikId'=>$id])->get();
    }
    public function update($id,$ime,$prezime,$adresa,$telefon,$email,$username,$aktivan,$uloga){
        DB::table('korisnik')->where('korisnikId','=',$id)->update(['ime'=>$ime,'prezime'=>$prezime,
            'adresa'=>$adresa,'telefon'=>$telefon,'email'=>$email,'username'=>$username,'aktivan'=>$aktivan,'ulogaId'=>$uloga]);
    }
    public function delete($id){
        DB::table('korisnik')->where(['korisnikId'=>$id])->delete();
    }
}