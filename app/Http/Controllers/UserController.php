<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/13/2019
 * Time: 1:21 PM
 */

namespace App\Http\Controllers;


use App\Models\korisnik;
use App\Models\uloga;
use Illuminate\Http\Request;

class UserController
{
    public function updateForma(Request $request){
        $id=$request->post('id');
        $korisnik = new korisnik();
        $korisnici['korisnici'] = $korisnik->getOne($id);

        $uloga = new uloga();
        $korisnici['uloge'] = $uloga->getAll();

        return $korisnici;
    }
    public function update(Request $request){
        $id = $request->post('id');
        $ime= $request->post('ime');
        $prezime= $request->post('prezime');
        $adresa= $request->post('adresa');
        $telefon= $request->post('telefon');
        $email= $request->post('email');
        $username= $request->post('username');
        $aktivan= $request->post('aktivan');
        $uloga= $request->post('uloga');
        $korisnik = new korisnik();
        $korisnik->update($id,$ime,$prezime,$adresa,$telefon,$email,$username,$aktivan,$uloga);
        $podaci['korisnici'] = $korisnik->getAll();
        $uloga = new uloga();
        $podaci['uloge'] = $uloga->getAll();

        return $podaci;
    }

    public function delete(Request $request){
        $id=$request->post('id');
        $korisnik = new korisnik();
        $korisnik->delete($id);
        $podaci['korisnici'] = $korisnik->getAll();
        $uloga = new uloga();
        $podaci['uloge'] = $uloga->getAll();

        return $podaci;
    }
}