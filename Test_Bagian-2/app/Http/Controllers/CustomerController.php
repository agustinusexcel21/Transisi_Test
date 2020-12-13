<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
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
        $customers = \App\Customer::paginate(10);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $customers = \App\Customer::where('nama_customer', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            "nama_customer" => "required|min:3|max:30",      
            "kontak_customer" => "required|digits_between:10,12",
            "alamat_customer" => "required|min:5|max:200"
        ])->validate();

        $new_customer = new \App\customer;
        $new_customer->nama_customer = $request->get('nama_customer');
        $new_customer->alamat_customer = $request->get('alamat_customer');
        $new_customer->kontak_customer = $request->get('kontak_customer');
        $new_customer->save();
        return redirect()->route('customers.create')->with('status', 'customer Berhasil Ditambahkan');
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
        $customer = \App\Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $customer]);
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
            "nama_customer" => "required|min:3|max:30",      
            "kontak_customer" => "required|digits_between:10,12",
            "alamat_customer" => "required|min:5|max:200"
        ])->validate();

        $customer = \App\customer::findOrFail($id);
        $customer->nama_customer = $request->get('nama_customer');
        $customer->alamat_customer = $request->get('alamat_customer');
        $customer->kontak_customer = $request->get('kontak_customer');
        $customer->save();
        return redirect()->route('customers.edit', ['id' => $id])->with('status', 'customer Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = \App\Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('status', 'customer successfully delete');
    }
}
