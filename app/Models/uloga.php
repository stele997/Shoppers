<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/11/2019
 * Time: 7:03 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class uloga
{
    public function getAll(){
        return DB::table('uloga')->get();
    }
    public function insert($naziv){
        DB::table('uloga')->insert(['nazivUloge'=>$naziv]);
    }
    public function delete($id){
        DB::table('uloga')->where('ulogaId', '=', $id)->delete();
    }
}