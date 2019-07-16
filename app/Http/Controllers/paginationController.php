<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/8/2019
 * Time: 4:02 PM
 */

namespace App\Http\Controllers;


use App\Models\proizvod;
use Illuminate\Http\Request;

class paginationController
{
    public function fetch_data(Request $request){
        if($request->ajax()){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->getAll();
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
    }
    }
    public function fetch_dataMan(Request $request){
        if($request->ajax()){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->getAllMen();
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
        }
    }
    public function fetch_dataWoman(Request $request){
        if($request->ajax()){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->getAllWomen();
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
        }
    }
}