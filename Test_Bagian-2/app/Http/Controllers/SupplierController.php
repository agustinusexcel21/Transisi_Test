<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller
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
        $suppliers = \App\Supplier::paginate(10);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $suppliers = \App\Supplier::where('nama_supplier', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            "nama_supplier" => "required|min:3|max:30",      
            "kontak_supplier" => "required|digits_between:10,12",
            "alamat_supplier" => "required|min:5|max:200"
        ])->validate();

        $new_supplier = new \App\Supplier;
        $new_supplier->nama_supplier = $request->get('nama_supplier');
        $new_supplier->alamat_supplier = $request->get('alamat_supplier');
        $new_supplier->kontak_supplier = $request->get('kontak_supplier');
        $new_supplier->save();
        return redirect()->route('suppliers.index')->with('status', 'supplier Berhasil Ditambahkan');
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
        $supplier = \App\Supplier::findOrFail($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
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
            "nama_supplier" => "required|min:3|max:30",      
            "kontak_supplier" => "required|digits_between:10,12",
            "alamat_supplier" => "required|min:5|max:200"
        ])->validate();

        $supplier = \App\Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->get('nama_supplier');
        $supplier->alamat_supplier = $request->get('alamat_supplier');
        $supplier->kontak_supplier = $request->get('kontak_supplier');
        $supplier->save();
        return redirect()->route('suppliers.edit', ['id' => $id])->with('status', 'Supplier Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = \App\Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('status', 'Supplier successfully delete');
    }

    // public function ajaxSearch(Request $request){   
    //     $keyword = $request->get('q'); 
    //     $suppliers = \App\Supplier::where("nama_supplier", "LIKE", "%$keyword%")>get(); 
       
    //     return $suppliers; 
    // }

}
