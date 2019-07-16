<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/6/2019
 * Time: 4:30 PM
 */

namespace App\Http\Controllers;


use App\Models\proizvod;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use \Psy\Util\Json;


class cart
{
    public function addToCart($id,$kolicina){
        $proizvod = new proizvod();

        $result=$proizvod->getOne($id);

        $result['kolicina']=$kolicina;
        if(Session::has('cart')){
            Session::push('cart', $result);
        }else{
            session()->push('cart',$result);
        }

        return (session('cart'));
    }
    public function removeFromCart($id)
    {

        $niz=session('cart');
        $novaSesija = [];
        session()->forget('cart');
        for($i=0;$i<count($niz);$i++){
            if($niz[$i][0]->proizvodId!=$id){
                array_push($novaSesija, $niz[$i]);
            }
        }
        session()->put("cart", $novaSesija);
        return session()->get("cart");

    }
}