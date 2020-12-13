<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Sparepart;
use App\Barang_History;
use App\History_Detail;

class History_DetailController extends Controller
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
        $history_details = \App\History_Details::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $history_details = \App\Pengadaan_Detail::where('id', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('history_details.index', ['history_details' => $history_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang_histories = \App\Barang_History::all();
        $data['barang_histories'] = $barang_histories;
        $spareparts = \App\Sparepart::all();
        $data['spareparts'] = $spareparts;

        return view('history_details.create',$data);
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
            "id_barang_history" => "required",
            "id_sparepart" => "required",
            "satuan" => "required"
        ])->validate();

        $new_history_detail = new \App\History_Details;
        $new_history_detail->id_barang_history = $request->get('id_barang_history');
        $new_history_detail->id_sparepart = $request->get('id_sparepart');
        $new_history_detail->satuan = $request->get('satuan');
        $new_history_detail->save();
        return redirect()->route('barang_histories.index')->with('status', 'Input Berhasil!');
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
