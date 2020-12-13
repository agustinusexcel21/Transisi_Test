<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homepage;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $spareparts = \App\Sparepart::all();
        $filterKeyword = $request->get('nama_sparepart');
        if($filterKeyword){
            $spareparts = \App\Sparepart::where('nama_sparepart', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('frontends.homepage', ['spareparts'=>$spareparts]);
    }
}
