<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Role;
use App\Cabang;
use App\User;

class UserController extends Controller
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
        $users = \App\User::paginate(10);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $users = \App\User::where('nama_pegawai', 'LIKE', "%$filterKeyword%")->orWhere('id','LIKE', "$filterKeyword")->paginate(10);
        }
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::all();
        $data['roles'] = $roles;
        $cabangs = \App\Cabang::all();
        $data['cabangs'] = $cabangs;

        return view("users.create",$data);
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
            "nama_pegawai" => "required|min:3|max:20", 
            "email" => "required|email|unique:users",      
            "password" => "required",       
            "konfirmasi_password" => "required|same:password",
            "kontak_pegawai" => "required|digits_between:10,12",       
            "alamat_pegawai" => "required|min:5|max:200"
        ])->validate();

        $new_user = new \App\User;
        $new_user->nama_pegawai = $request->get('nama_pegawai');
        $new_user->id_role = $request->get('id_role');
        $new_user->id_cabang = $request->get('id_cabang');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->alamat_pegawai = $request->get('alamat_pegawai');
        $new_user->kontak_pegawai = $request->get('kontak_pegawai');
        $new_user->gaji_per_minggu = $request->get('gaji_per_minggu');       
        $new_user->save();
        return redirect()->route('users.index')->with('status', 'Pegawai Berhasil Ditambahkan');
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
        $roles = \App\Role::all();
        $data['roles'] = $roles;
        $cabangs = \App\Cabang::all();
        $data['cabangs'] = $cabangs;   
        $user = \App\User::findOrFail($id);
        $data['user'] = $user;   
        return view('users.edit', $data);
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
             "nama_pegawai" => "required|min:3|max:20", 
             "kontak_pegawai" => "required|digits_between:10,12",
             "email" => "required",
             "alamat_pegawai" => "required|min:5|max:200"
         ])->validate();

        $user = \App\User::findOrFail($id);
        $user->nama_pegawai = $request->get('nama_pegawai');
        $user->id_role = $request->get('id_role');
        $user->id_cabang = $request->get('id_cabang');
        $user->email = $request->get('email');
        $user->alamat_pegawai = $request->get('alamat_pegawai');
        $user->kontak_pegawai = $request->get('kontak_pegawai');
        $user->gaji_per_minggu = $request->get('gaji_per_minggu');  
        $user->save();
        return redirect()->route('users.index', ['id' => $id])->with('status','Pegawai succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User successfully delete');
    }
}
