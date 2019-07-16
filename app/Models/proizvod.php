<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/5/2019
 * Time: 7:10 PM
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;
class proizvod
{
    public function getAll(){
        return DB::table('proizvod')->paginate(6);
    }
    public function getAllMen(){
        return DB::table('proizvod')->where(['polId'=>1])->paginate(6);
    }
    public function getAllWomen(){
        return DB::table('proizvod')->where(['polId'=>2])->paginate(6);
    }
    public function getAllWithoutPagination(){
        return DB::table('proizvod')->get();
    }
    public function getOne($id){
        return DB::table('proizvod')->where('proizvodId','=',$id)->get();
    }
    public function findOnName($string){
        return DB::table('proizvod')->where('nazivProizvoda','like','%'.$string.'%')->paginate(6);
    }
    public function findOnNameMan($string){
        return DB::table('proizvod')->where([['nazivProizvoda','like','%'.$string.'%'],['polId','=',1]])->paginate(6);
    }
    public function findOnNameWomen($string){
        return DB::table('proizvod')->where([['nazivProizvoda','like','%'.$string.'%'],['polId','=',2]])->paginate(6);
    }
    public function insert($naziv, $cena,$slika,$slikaAlt,$kolicina,$pol){
        DB::table('proizvod')->insert(['nazivProizvoda'=>$naziv,'cena'=>$cena,'slika'=>$slika,'alt'=>$slikaAlt,'kolicina'=>$kolicina,'polId'=>$pol]);
    }
    public function updateBezSlika($id,$naziv, $cena,$slikaAlt,$kolicina,$pol){
        DB::table('proizvod')->where('proizvodId','=',$id)->update(['nazivProizvoda'=>$naziv,'cena'=>$cena,'alt'=>$slikaAlt,'kolicina'=>$kolicina,'polId'=>$pol]);
    }
    public function update($id,$naziv,$slika, $cena,$slikaAlt,$kolicina,$pol){
        DB::table('proizvod')->where('proizvodId','=',$id)->update(['nazivProizvoda'=>$naziv,'cena'=>$cena,'slika'=>$slika,'alt'=>$slikaAlt,'kolicina'=>$kolicina,'polId'=>$pol]);
    }
    public function delete($id){
        return DB::table('proizvod')->where('proizvodId','=',$id)->delete();
    }
    public function petProizvoda(){
        return DB::table('proizvod')->orderBy('kolicina','desc')->limit(5)->get();
    }
}