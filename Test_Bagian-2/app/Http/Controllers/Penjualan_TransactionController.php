<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Penjualan_Transaction;
use App\Penjualan_Detail;
use App\Service_Detail;
use App\Customer;
use App\User;
use App\Service;
use App\Sparepart;

class Penjualan_TransactionController extends Controller
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
        $penjualan_transactions = \App\Penjualan_Transaction::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $penjualan_transactions = \App\Penjualan_Transaction::where('kode_transaksi', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('penjualan_transactions.index', ['penjualan_transactions' => $penjualan_transactions]);
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
        $customers = \App\Customer::all();
        $data['customers'] = $customers;

        return view('penjualan_transactions.create',$data);
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
            "tanggal_transaksi" => "required", 
        ])->validate();

        $all = $request->all();
        $all["kode_transaksi"] = $all["kode_transaksi_dpn"]."-".$all["kode_transaksi_blkng"];
        $all['status']='PROSES';
        $all['biaya_service']=0;
        $all['biaya_sparepart']=0;
        $penjualan_transactions = Penjualan_Transaction::create($all);
        return redirect()->route('penjualan_transactions.show',['id'=>$penjualan_transactions->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan_transactions = Penjualan_Transaction::find($id);
        $data['penjualan_transaction'] = $penjualan_transactions;
        return view('penjualan_transactions.show', $data);
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
        // $validation = \Validator::make($request->all(),[
        //     "tanggal_transaksi" => "required", 
        //     "waktu_transaksi" => "required",      
        //     "status" => "required",
        // ])->validate();

        // $penjualan_transaction = \App\Penjualan_Transaction::findOrFail($id);
        // $penjualan_transaction->kode_transaksi = $request->get('kode_transaksi');
        // $penjualan_transaction->id_customer = $request->get('id_customer');
        // $penjualan_transaction->id_pegawai = $request->get('id_pegawai');
        // $penjualan_transaction->tanggal_transaksi = $request->get('tanggal_transaksi');
        // $penjualan_transaction->status = $request->get('status');
        // $penjualan_transaction->biaya_sparepart = 0;
        // $penjualan_transaction->biaya_service = 0;
        // $penjualan_transaction->save();
        // return redirect()->route('penjualan_transactions.index', ['id' => $id])->with('status', 'Transaksi Succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan_transaction = \App\Penjualan_Transaction::findOrFail($id);
        $penjualan_transaction->delete();
        return redirect()->route('penjualan_transactions.index')->with('status', 'Transaksi successfully delete');
    }

    public function detailCreate()
    {
        $services = Service::all();
        $data['services'] = $services;
        $spareparts = Sparepart::all();
        $data['spareparts'] = $spareparts;
        $penjualan_transactions = Penjualan_Transaction::where('status','PROSES')->get();
        $data['penjualan_transactions'] = $penjualan_transactions;
        return view('penjualan_transactions.detail_create',$data);

    }

    public function detailStore(Request $request)
    {
        $all = $request->all();
        $jenis_transaksi=$request->input('jenis_transaksi');
        if($jenis_transaksi=='sparepart'){
            $all['jumlah_sparepart']=$all['jumlah'];
            $penjualan_transactions = Sparepart::create($all);
        }else if($jenis_transaksi=='service'){
            $all['jumlah_service']=$all['jumlah'];
            $penjualan_transactions = Service::create($all);
        }
        
        return redirect()->route('penjualan_transactions.index');
    }
}
