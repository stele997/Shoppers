<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/8/2019
 * Time: 3:30 PM
 */

namespace App\Http\Controllers;


use App\Models\proizvod;
use Illuminate\Http\Request;

class shop
{
    public function search(Request $request){
        $query= $request->get('query') ;
        if($query!=''){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->findOnName($query);
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
        }else{
            if($request->ajax()){
                $proizvod = new proizvod();
                $proizvodi=$proizvod->getAll();
                return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
            }
        }
    }

    public function searchMen(Request $request){
        $query= $request->get('query') ;
        if($query!=''){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->findOnNameMan($query);
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
        }else{
            if($request->ajax()){
                $proizvod = new proizvod();
                $proizvodi=$proizvod->getAllMen();
                return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
            }
        }
    }
    public function searchWomen(Request $request){
        $query= $request->get('query') ;
        if($query!=''){
            $proizvod = new proizvod();
            $proizvodi=$proizvod->findOnNameWomen($query);
            return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
        }else{
            if($request->ajax()){
                $proizvod = new proizvod();
                $proizvodi=$proizvod->getAllWomen();
                return view('inc.listaProizvodaZaShop',compact('proizvodi'))->render();
            }
        }
    }
}