<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/2/2019
 * Time: 1:39 PM
 */

namespace App\Http\Controllers;
use App\Models\korisnik;
use App\Models\pol;
use App\Models\proizvod;
use Illuminate\Support\Facades\Session;

class FrontEndController
{
    public function index(){
        $proizvod = new proizvod();
        $proizvodi = $proizvod->petProizvoda();
        return view('index',['proizvodi'=>$proizvodi]);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function shop(){
        $proizvod = new proizvod();
        $proizvodi=$proizvod->getAll();
        return view('shop',['proizvodi'=>$proizvodi]);
    }
    public function men(){
        $proizvod = new proizvod();
        $pol = new pol();
        $polId = $pol->getIdMen()[0]->polId;
        $proizvodi=$proizvod->getAllMen($polId);
        return view('men',['proizvodi'=>$proizvodi]);
    }
    public function women(){
        $proizvod = new proizvod();
        $pol = new pol();
        $polId = $pol->getIdWomen()[0]->polId;
        $proizvodi=$proizvod->getAllWomen($polId);

        return view('women',['proizvodi'=>$proizvodi]);
    }
    public function singleProduct($id){
        $proizvod = new proizvod();
        $result = $proizvod->getOne($id)->first();
        $proizvodi = $proizvod->petProizvoda();
        return view('singleProduct',['proizvod'=>$result,'proizvodi'=>$proizvodi]);
    }
    public function cart(){
        if(session('cart')){
            $kolicina=0;
            if(Session::has('cart')){
                foreach (session('cart')as $item){
                    $kolicina+=$item[0]->cena*$item['kolicina'];
                }
            }

        }else{
            $kolicina=0;
        }
        return view('cart',['ukupno'=>$kolicina]);
    }
    public function checkout(){
        if(Session::has('cart')){
            $nizKorpa=\session('cart');
            $kolicina=0;
            for($i=0;$i<count($nizKorpa);$i++){
                $kolicina+=$nizKorpa[$i][0]->cena*$nizKorpa[$i]['kolicina'];

            }

            return view('checkOut',['korpa'=>$nizKorpa,'ukupno'=>$kolicina]);
        }
        return view('checkOut');
    }
    public function thankyou(){
        return view('thankyou');
    }
    public function logIn($var=""){
        return view('logIn',['poruka'=>$var]);
    }
    public function acctivate($aktivacioniKod=""){
        $korisnik = new korisnik();
        $korisnik->acctivate($aktivacioniKod);
        return view('thankYou',['poruka'=>"Your account is acctivated!"]);
    }
}