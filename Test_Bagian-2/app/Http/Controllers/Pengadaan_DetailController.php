<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Sparepart;
use App\Pengadaan_Transaction;

class Pengadaan_DetailController extends Controller
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
        $pengadaan_details = \App\Pengadaan_Detail::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $pengadaan_details = \App\Pengadaan_Detail::where('id', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('pengadaan_details.index', ['pengadaan_details' => $pengadaan_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengadaan_transactions = \App\Pengadaan_Transaction::all();
        $data['pengadaan_transactions'] = $pengadaan_transactions;
        $spareparts = \App\Sparepart::all();
        $data['spareparts'] = $spareparts;

        return view('pengadaan_details.create',$data);
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
            "id_pengadaan" => "required",
            "id_sparepart" => "required",
            "satuan" => "required",
            "jumlah_sparepart" => "required"
        ])->validate();

        $new_pengadaan_detail = new \App\Pengadaan_Detail;
        $new_pengadaan_detail->id_pengadaan = $request->get('id_pengadaan');
        $new_pengadaan_detail->id_sparepart = $request->get('id_sparepart');
        $new_pengadaan_detail->satuan = $request->get('satuan');
        $new_pengadaan_detail->jumlah_sparepart = $request->get('jumlah_sparepart');
        $new_pengadaan_detail->save();
        return redirect()->route('pengadaan_transactions.index')->with('status', 'Siap Cetak!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengadaan_transaction = \App\Pengadaan_Transaction::findOrFail($id);
        return view('pengadaan_transactions.show', ['pengadaan_transaction' => $pengadaan_transaction]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengadaan_transactions = \App\Pengadaan_Transaction::all();
        $data['pengadaan_transactions'] = $pengadaan_transactions;
        $spareparts = \App\Sparepart::all();
        $data['spareparts'] = $spareparts;
        $pengadaan_details = \App\pengadaan_Detail::findOrFail($id);
        $data['pengadaan_detail'] = $pengadaan_details;
        return view('pengadaan_details.edit',$data);
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
            "satuan" => "required"
        ])->validate();

        $pengadaan_detail = \App\Pengadaan_Detail::findOrFail($id);
        $pengadaan_detail->id_pengadaan = $request->get('id_pengadaan');
        $pengadaan_detail->id_sparepart = $request->get('id_sparepart');
        $pengadaan_detail->satuan = $request->get('satuan');
        $pengadaan_detail->save();
        return redirect()->route('pengadaan_transactions.index', ['id' => $id])->with('status', 'Siap Cetak!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengadaan_detail = \App\Pengadaan_Detail::findOrFail($id);
        $pengadaan_detail->delete();
        return redirect()->route('pengadaan_details.index')->with('status', 'Detail successfully delete');
    }
}
