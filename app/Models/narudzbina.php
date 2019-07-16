<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/7/2019
 * Time: 9:56 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class narudzbina
{
    public function ubaciNarudzbinu($korisnikId,$ime,$prezime,$adresa,$email,$telefon,$vreme,$proizvodId,$cena,$kolicina){
        DB::table('narudzbina')->insert([
            'korisnikId'=>$korisnikId,
            'ime'=>$ime,
            'prezime'=>$prezime,
            'adresa'=>$adresa,
            'email'=>$email,
            'telefon'=>$telefon,
            'vreme'=>$vreme,
            'proizvodId'=>$proizvodId,
            'cena'=>$cena,
            'kolicina'=>$kolicina
        ]);
    }
    public function getAll(){
        return DB::table('narudzbina')->get();
    }
}