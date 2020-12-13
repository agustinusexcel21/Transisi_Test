<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Kendaraan;
use App\Customer;

class KendaraanController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda Belum Login!'); //masihsalah
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kendaraans = \App\Kendaraan::paginate(10); 
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $kendaraans = \App\Kendaraan::where('no_polisi', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('kendaraans.index', ['kendaraans'=> $kendaraans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = \App\customer::all();
        $data['customers'] = $customers;
        return view('kendaraans.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "no_polisi" => "required|min:3|max:12|unique:kendaraans",
            "merk" => "required|min:3|max:30",
            "tipe" => "required|min:3|max:30"
        ])->validate();

        $new_kendaraan = new \App\Kendaraan;
        $new_kendaraan->id_customer = $request->get('id_customer');
        $new_kendaraan->no_polisi = $request->get('no_polisi');
        $new_kendaraan->merk = $request->get('merk');
        $new_kendaraan->tipe = $request->get('tipe');
        $new_kendaraan->save();
        return redirect()->route('kendaraans.create')->with('status', 'kendaraan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = \App\Customer::all();
        $data['customers'] = $customers;
        $kendaraan = \App\Kendaraan::findOrFail($id);
        $data['kendaraan'] = $kendaraan;
        return view('kendaraans.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "no_polisi" => "required|min:3|max:12",
            "merk" => "required|min:3|max:30",
            "tipe" => "required|min:3|max:30"
        ])->validate();

        $kendaraan = \App\Kendaraan::findOrFail($id);
        $kendaraan->id_customer = $request->get('id_customer');
        $kendaraan->no_polisi = $request->get('no_polisi');
        $kendaraan->merk = $request->get('merk');
        $kendaraan->tipe = $request->get('tipe');
        $kendaraan->save();
        return redirect()->route('kendaraans.index', ['id' => $id])->with('status','kendaraan succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = \App\Kendaraan::findOrFail($id);
        $kendaraan->delete();
        return redirect()->route('kendaraans.index')->with('status', 'kendaraan successfully delete');
    }
}
