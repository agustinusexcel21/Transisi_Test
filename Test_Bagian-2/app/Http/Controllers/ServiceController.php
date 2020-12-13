<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = \App\Service::paginate(10);
        $filterKeyword = $request->get('nama_service');
        if($filterKeyword){
            $services = \App\service::where('nama_service', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }        
        return view('services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            "nama_service" => "required|min:3|max:30"
        ])->validate();

        $new_service = new \App\Service;
        $new_service->nama_service = $request->get('nama_service');
        $new_service->harga_service = $request->get('harga_service');
        $new_service->save();
        return redirect()->route('services.create')->with('status', 'Service Berhasil Ditambahkan');
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
        $service_to_edit = \App\Service::findOrFail($id);
            return view('services.edit', ['service' => $service_to_edit]);
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
            "nama_service" => "required|min:3|max:30"
        ])->validate();

        $service = \App\Service::findOrFail($id);
        $service->nama_service = $request->get('nama_service');
        $service->harga_service = $request->get('harga_service');
        $service->save();
        return redirect()->route('services.edit', ['id' => $id])->with('status', 'Service succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = \App\Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('status', 'service successfully delete');
    }
}
