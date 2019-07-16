<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/12/2019
 * Time: 1:27 PM
 */

namespace App\Http\Controllers;


use App\Models\pol;
use App\Models\proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    public function insert(Request $request){
        $naziv= $request->post('naziv');
        $cena= $request->post('cena');
        $slika_alt= $request->post('slika_alt');
        $kolicina= $request->post('kolicina');
        $pol=$request->post('pol');
        $slika = $request->file('slika');
        $fileName = $slika->getClientOriginalName();
        $fileName = time().'_'.$fileName;
        try {
            $slika->move(public_path('images'), $fileName);
            $product = new proizvod();
            $product->insert($naziv,$cena,$fileName,$slika_alt,$kolicina,$pol);
            return redirect('/products');

        }catch(Exception $e){

        }
    }

    public function updateForma(Request $request){
        $id=$request->post('id');
        $proizovd=  new proizvod();
        $pol= new pol();
        $polovi = $pol->getAll();
        $proizvodi['proizvod']= $proizovd->getOne($id);
        $proizvodi['polovi']=$polovi;
        return $proizvodi;
    }

    public function update(Request $request){
        $id=$request->post('id');
        $naziv= $request->post('naziv');
        $cena= $request->post('cena');
        $slika_alt= $request->post('slika_alt');
        $kolicina= $request->post('kolicina');
        $pol=$request->post('pol');

        $slika = $request->file('slika');
        if($slika==null){

            $proizvod= new proizvod();
            $proizvod->updateBezSlika($id,$naziv,$cena,$slika_alt,$kolicina,$pol);
            return redirect('/products');
        }else{
            $slika = $request->file('slika');
            $fileName = $slika->getClientOriginalName();
            $fileName = time().'_'.$fileName;
            try {
                $slika->move(public_path('images'), $fileName);
                $product = new proizvod();
                $product->update($id,$naziv,$fileName,$cena,$slika_alt,$kolicina,$pol);
                return redirect('/products');

            }catch(Exception $e){

            }
        }

    }

    public function delete(Request $request){
        $id=$request->post('id');
        $proiuzvod = new proizvod();
        $proiuzvod->delete($id);
        $proizvodi = $proiuzvod->getAllWithoutPagination();
        return $proizvodi;
    }
}