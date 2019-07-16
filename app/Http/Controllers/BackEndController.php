<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/11/2019
 * Time: 5:20 PM
 */

namespace App\Http\Controllers;


use App\Models\korisnik;
use App\Models\narudzbina;
use App\Models\pol;
use App\Models\proizvod;
use App\Models\uloga;
use Illuminate\Support\Facades\Session;

class BackEndController
{
    public function proizovd(){
        if(Session::has('user')&&session('user')->first()->ulogaId==1){

            $proizvod = new proizvod();
            $proizvodi = $proizvod->getAllWithoutPagination();
            $pol = new pol();
            $polovi=$pol->getAll();
            return view('admin.insertProduct',['proizvodi'=>$proizvodi,'polovi'=>$polovi]);
        }else
            {
            return response('', 404);
        }
    }
    public function uloga(){
        if(Session::has('user')&&session('user')->first()->ulogaId==1){

            $uloga = new uloga();
            $uloge = $uloga->getAll();
            return view('admin.adminUloga',['uloge'=>$uloge]);
        }else
        {
            return response('', 404);
        }
    }
    public function korisnik(){
        $korisnik = new korisnik();
        $korisnici = $korisnik->getAll();

        $uloga = new uloga();
        $uloge = $uloga->getAll();
        return view('admin.adminKorisnik',['korisnici'=>$korisnici,'uloge'=>$uloge]);
    }
    public function narudzbine(){
        $narudzbina = new narudzbina();
        $narudzbine=$narudzbina->getAll();
        $proizvod = new proizvod();
        $proizvodi = $proizvod->getAllWithoutPagination();
        return view('admin.adminNarudzbine',['narudzbine'=>$narudzbine,'proizvodi'=>$proizvodi]);
    }
}