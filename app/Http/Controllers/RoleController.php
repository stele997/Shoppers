<?php
/**
 * Created by PhpStorm.
 * User: Stele
 * Date: 3/11/2019
 * Time: 7:16 PM
 */

namespace App\Http\Controllers;



use App\Models\uloga;
use Illuminate\Http\Request;

class RoleController
{
    public function insert(Request $request){

        $nazivRole= $request->post('naziv');
        $uloga = new uloga();
        $uloga->insert($nazivRole);
        $uloge=$uloga->getAll();
        return $uloge;
    }
    public function delete(Request $request){

        $id= $request->post('id');
        $uloga = new uloga();
        $uloga->delete($id);
        $uloge=$uloga->getAll();
        return $uloge;
    }
}