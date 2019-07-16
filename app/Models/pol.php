<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/12/2019
 * Time: 2:23 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class pol
{
    public function getAll(){
        return DB::table('pol')->get();
    }
    public function getIdMen(){
        return DB::table('pol')->where('nazivPola','=','men')->get('polId');
    }
    public function getIdWomen(){
        return DB::table('pol')->where('nazivPola','=','women')->get('polId');
    }
}