<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Supplier;

class Pengadaan_TransactionController extends Controller
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
        $pengadaan_transactions = \App\Pengadaan_Transaction::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $pengadaan_transactions = \App\pengadaan_Transaction::where('kode_pengadaan', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('pengadaan_transactions.index', ['pengadaan_transactions' => $pengadaan_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = \App\Supplier::all();
        $data['suppliers'] = $suppliers;

        return view('pengadaan_transactions.create',$data);
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
            "tanggal_pengadaan" => "required", 
            "id_supplier" => "required",
            "kode_pengadaan" => "required"
        ])->validate();

        $new_pengadaan_transaction = new \App\Pengadaan_Transaction;
        $new_pengadaan_transaction->id_supplier = $request->get('id_supplier');
        $new_pengadaan_transaction->kode_pengadaan = $request->get('kode_pengadaan');
        $new_pengadaan_transaction->tanggal_pengadaan = $request->get('tanggal_pengadaan');
        $new_pengadaan_transaction->status_cetak = $request->get('status_cetak');
        $new_pengadaan_transaction->save();
        return redirect()->route('pengadaan_details.create',['id'=>$new_pengadaan_transaction->id])->with('status', 'Pengadaan Siap!');
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
        $suppliers = \App\Supplier::all();
        $data['suppliers'] = $suppliers;
        $pengadaan_transactions = \App\Pengadaan_transaction::findOrFail($id);
        $data['pengadaan_transaction'] = $pengadaan_transactions;
        return view('pengadaan_transactions.edit',$data);
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
            "tanggal_pengadaan" => "required", 
            "id_supplier" => "required",
        ])->validate();

        $pengadaan_transaction = \App\Pengadaan_Transaction::findOrFail($id);
        $pengadaan_transaction->id_supplier = $request->get('id_supplier');
        $pengadaan_transaction->tanggal_pengadaan = $request->get('tanggal_pengadaan');
        $pengadaan_transaction->status_cetak = $request->get('status_cetak');
        $pengadaan_transaction->save();
        return redirect()->route('pengadaan_details.index',  ['id' => $id])->with('status', 'Pengadaan Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengadaan_transaction = \App\Pengadaan_Transaction::findOrFail($id);
        $pengadaan_transaction->delete();
        return redirect()->route('pengadaan_transactions.index')->with('status', 'Pengadaan successfully delete');
    }
}
