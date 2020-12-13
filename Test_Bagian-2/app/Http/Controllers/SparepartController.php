<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SparepartController extends Controller
{
    public function ajaxSearch(Request $request){   $keyword = $request->get('q'); 
 
        $spareparts = \App\Sparepart::where("nama_sparepart", "LIKE", "%$keyword%")->get(); 
       
        return $spareparts; 
    }

    public function __construct(){
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-spareparts')) return $next($request);
            abort(403, 'Anda Belum Login!');//masihsalah
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request)
    {
        $spareparts = \App\Sparepart::paginate(10);
        $filterKeyword = $request->get('kode_sparepart');
        if($filterKeyword){
            $spareparts = \App\Sparepart::where('kode_sparepart', 'LIKE', "%$filterKeyword%")->orWhere('nama_sparepart','LIKE', "$filterKeyword")->paginate(10);
        }      
        return view('spareparts.index', ['spareparts' => $spareparts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spareparts.create');
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
            "kode_sparepart" => "required|min:3|max:6", 
            "nama_sparepart" => "required|min:3|max:30",      
            "merk_sparepart" => "required|min:3|max:30",
            "tipe_sparepart" => "required|min:3|max:30",
            "kode_lokasi" => "required|min:3|max:7",
            "satuan" => "required|min:3|max:30",
            "gambar_sparepart" => "required"
        ])->validate();

        $new_sparepart = new \App\Sparepart;
        $new_sparepart->kode_sparepart = $request->get('kode_sparepart');
        $new_sparepart->nama_sparepart = $request->get('nama_sparepart');
        $new_sparepart->merk_sparepart = $request->get('merk_sparepart');
        $new_sparepart->tipe_sparepart = $request->get('tipe_sparepart');
        $new_sparepart->kode_lokasi = $request->get('kode_lokasi');
        $new_sparepart->harga_jual = $request->get('harga_jual');
        $new_sparepart->harga_beli = $request->get('harga_beli');
        $new_sparepart->satuan = $request->get('satuan');
        $new_sparepart->stock = $request->get('stock');
        $new_sparepart->stock_minimal = $request->get('stock_minimal');
        if($request->file('gambar_sparepart')){
            $file = $request->file('gambar_sparepart')->store('gambar_spareparts', 'public');
            $new_sparepart->gambar_sparepart = $file;
            }
        $new_sparepart->save();
        return redirect()->route('spareparts.create')->with('status', 'Sparepart Berhasil Ditambahkan');
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
        $sparepart_to_edit = \App\Sparepart::findOrFail($id);
            return view('spareparts.edit', ['sparepart' => $sparepart_to_edit]);
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
            "kode_sparepart" => "required|min:3|max:6", 
            "nama_sparepart" => "required|min:3|max:30",      
            "merk_sparepart" => "required|min:3|max:30",
            "tipe_sparepart" => "required|min:3|max:30",
            "kode_lokasi" => "required|min:3|max:7",
            "satuan" => "required|min:3|max:30",
        ])->validate();

        $sparepart = \App\Sparepart::findOrFail($id);
        $sparepart->kode_sparepart = $request->get('kode_sparepart');
        $sparepart->nama_sparepart = $request->get('nama_sparepart');
        $sparepart->merk_sparepart = $request->get('merk_sparepart');
        $sparepart->tipe_sparepart = $request->get('tipe_sparepart');
        $sparepart->kode_lokasi = $request->get('kode_lokasi');
        $sparepart->harga_jual = $request->get('harga_jual');
        $sparepart->harga_beli = $request->get('harga_beli');
        $sparepart->satuan = $request->get('satuan');
        $sparepart->stock = $request->get('stock');
        $sparepart->stock_minimal = $request->get('stock_minimal');
        if($request->file('gambar_sparepart')){
            if($sparepart->gambar_sparepart && file_exists(storage_path('app/public/'.$sparepart->gambar_sparepart))){
                \Storage::delete('public/' . $sparepart->nama_sparepart);
            }
            $new_image = $request->file('gambar_sparepart')->store('gambar_sparepart','public');
            $sparepart->gambar_sparepart = $new_image;
            }           
        $sparepart->save();
        return redirect()->route('spareparts.edit', ['id' => $id])->with('status','Sparepart succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = \App\Sparepart::findOrFail($id);
        $sparepart->delete();
        return redirect()->route('spareparts.index')->with('status', 'Sparepart successfully delete');
    }
}
