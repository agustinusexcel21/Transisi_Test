<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Kendaraan_Detail;
use App\Service;
use App\Penjualan_Detail;
use App\Service_Detail;
use App\Penjualan_Transaction;
use DB;

class Service_DetailController extends Controller
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
        $service_details = \App\Service_Detail::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $service_details = \App\Service_Detail::where('id', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('service_details.index', ['service_details' => $service_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_penjualan=$request->input('id_penjualan');
        $data['id_penjualan'] = $id_penjualan;
        $penjualan_transactions = \App\Penjualan_Transaction::all();
        $data['penjualan_transactions'] = $penjualan_transactions;
        $services = \App\Service::all();
        $data['services'] = $services;
        $kendaraan_details = \App\Kendaraan_Detail::all();
        $data['kendaraan_details'] = $kendaraan_details;

        return view('service_details.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_penjualan=$request->input('id_penjualan');
        $all = $request->all();
        $all['harga_service']=0;
        $all['sub_total']=0;
        $service_details = Service_Detail::create($all);
        $penjualan_transaction=Penjualan_Transaction::find($id_penjualan);
        $totalservice = Service_Detail::where('id',$id_penjualan)->sum(DB::raw('sub_total'));
        $penjualan_transaction->biaya_service=$totalservice;
        $penjualan_transaction->save();
        return redirect()->route('penjualan_transactions.show',['id'=>$id_penjualan])->with('status', 'Masuk Antrian!');
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
        $penjualan_transactions = Penjualan_Transaction::all();
        $data['penjualan_transactions'] = $penjualan_transactions;
        $services = Service::all();
        $data['services'] = $services;

        $service_details = Service_Detail::findOrFail($id);
        $data['service_details'] = $service_details;

        return view('service_details.edit',$data);
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
        $all = $request->all();
        $penjualan_transactions = Service_Detail::find($id)->update($all);
        return redirect()->route('service_details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan_transactions = Service_Detail::find($id)->delete();
        return redirect()->route('service_details.show',$data);
    }
}
