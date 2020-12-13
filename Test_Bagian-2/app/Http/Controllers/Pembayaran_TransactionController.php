<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Cabang;
use App\Penjualan_Detail;

class Pembayaran_TransactionController extends Controller
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
        $pembayaran_transactions = \App\Pembayaran_Transaction::paginate(10); 
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $pembayaran_transactions = \App\Pembayaran_Transaction::where('id', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('pembayaran_transactions.index', ['pembayaran_transactions'=> $pembayaran_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::all();
        $data['users'] = $users;
        $cabangs = \App\Cabang::all();
        $data['cabangs'] = $cabangs;
        // $penjualan_details = \App\Penjualan_Detail::all();
        // $data['penjualan_details'] = $penjualan_details;
        return view('pembayaran_transactions.create',$data);
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
            "id_pegawai" => "required",
            "id_cabang" => "required",
            "id_penjualan_detail" => "required",
        ])->validate();

        $new_pembayaran_transaction = new \App\Pembayaran_Transaction;
        $new_pembayaran_transaction->id_pegawai = $request->get('id_pegawai');
        $new_pembayaran_transaction->id_cabang = $request->get('id_cabang');
        $new_pembayaran_transaction->id_penjualan_detail = $request->get('id_penjualan_detail');
        $new_pembayaran_transaction->tanggal_transaksi = $request->get('tanggal_transaksi');
        $new_pembayaran_transaction->total_biaya = 0;
        $new_pembayaran_transaction->diskon = 0;
        $new_pembayaran_transaction->total_akhir = 0;
        $new_pembayaran_transaction->save();
        return redirect()->route('pembayaran_transactions.index')->with('status', 'Pembayaran Berhasil');
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
        //
    }
}
