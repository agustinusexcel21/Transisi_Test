<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Sales;
use App\Supplier;

class SalesController extends Controller
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
        $saless = \App\Sales::paginate(10); 
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $saless = \App\Sales::where('nama_sales', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('saless.index', ['saless'=> $saless]);
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
        return view('saless.create',$data);
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
            "nama_sales" => "required|min:3|max:30",      
            "kontak_sales" => "required|numeric|digits_between:10,12"
        ])->validate();

        $new_sales = new \App\Sales;
        $new_sales->nama_sales = $request->get('nama_sales');
        $new_sales->id_supplier = $request->get('id_supplier');
        $new_sales->kontak_sales = $request->get('kontak_sales');
        $new_sales->save();
        return redirect()->route('saless.index')->with('status', 'Sales Berhasil Ditambahkan');
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
        $sales = \App\Sales::findOrFail($id);
        $data['sales'] = $sales;
        return view('saless.edit', $data);
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
            "nama_sales" => "required|min:3|max:30",      
            "kontak_sales" => "required|digits_between:10,12"
        ])->validate();

        $sales = \App\Sales::findOrFail($id);
        $sales->nama_sales = $request->get('nama_sales');
        $sales->id_supplier = $request->get('id_supplier');
        $sales->kontak_sales = $request->get('kontak_sales');
        $sales->save();
        return redirect()->route('saless.index', ['id' => $id])->with('status','Sales succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales = \App\Sales::findOrFail($id);
        $sales->delete();
        return redirect()->route('saless.index')->with('status', 'Sales successfully delete');
    }
}
