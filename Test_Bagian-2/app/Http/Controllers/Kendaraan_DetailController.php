<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Kendaraan_Detail;
use App\User;
use App\Penjualan_Transaction;
use App\Kendaraan;
use DB;

class Kendaraan_DetailController extends Controller
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
    public function index()
    {
        $kendaraan_details = \App\Kendaraan_Detail::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $kendaraan_details = \App\Kendaraan_Detail::where('id_pejualan', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('kendaraan_details.index', ['kendaraan_details' => $kendaraan_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = \App\User::all();
        $data['users'] = $users;
        $kendaraans = \App\Kendaraan::all();
        $data['kendaraans'] = $kendaraans;
        $penjualan_transactions = \App\Penjualan_Transaction::all();
        $data['penjualan_transactions'] = $penjualan_transactions;

        return view('kendaraan_details.create',$data);
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
            "id_penjualan" => "required",
            "id_pegawai" => "required",
            "id_kendaraan" => "required"
        ])->validate();

        $id_penjualan=$request->input('id_penjualan');
        $all = $request->all();
        $kendaraan_details = Kendaraan_Detail::create($all);
        $penjualan_transaction=Penjualan_Transaction::find($id_penjualan);
        $penjualan_transaction->save();
        return redirect()->route('$service_details.create',['id'=>$kendaraan_details->id]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan_detail = \App\Kendaraan_Detail::findOrFail($id);
        $kendaraan_detail->delete();
        return redirect()->route('kendaraan_details.index')->with('status', 'Detail Kendaraan successfully delete');
    }
}
