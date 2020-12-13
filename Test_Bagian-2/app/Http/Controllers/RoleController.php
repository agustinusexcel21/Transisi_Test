<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function ajaxSearch(Request $request){   $keyword = $request->get('q'); 
 
        $roles = \App\Role::where("nama_role", "LIKE", "%$keyword%")>get(); 
       
        return $roles; }
}
