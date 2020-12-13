<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Supplier;

class Barang_HistoryController extends Controller
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
        $barang_histories = \App\Barang_History::all();
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $barang_histories = \App\Barang_History::where('id', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('barang_histories.index', ['barang_histories' => $barang_histories]);
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

        return view('barang_histories.create',$data);
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
            "tanggal_masuk" => "required", 
            "id_supplier" => "required",
        ])->validate();

        $new_barang_history = new \App\Barang_History;
        $new_barang_history->id_supplier = $request->get('id_supplier');
        $new_barang_history->tanggal_masuk = $request->get('tanggal_masuk');
        $new_barang_history->save();
        return redirect()->route('barang_histories.create')->with('status', '');
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
