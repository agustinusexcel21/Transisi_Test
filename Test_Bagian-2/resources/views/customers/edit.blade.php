@extends('layouts.global')
@section('title') Edit Customer @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('customers.update', ['id'=>$customer->id])}}" method="POST">
        @csrf
            <input type="hidden" value="PUT" name="_method">

            <label for="nama_customer">Nama customer</label>
            <input value="{{$customer->nama_customer}}" class="form-control {{$errors->first('nama_customer') ? "is-invalid": ""}}" placeholder="Nama customer" type="text" name="nama_customer" id="nama_customer"/>
            <div class="invalid-feedback">   
                {{$errors->first('nama_customer')}} 
            </div>
            <br>

            <label for="alamat_customer">Alamat customer</label>
            <textarea name="alamat_customer"id="alamat_customer" class="form-control {{$errors->first('alamat_customer') ? "is-invalid": ""}}">{{$customer->alamat_customer}}</textarea>
            <div class="invalid-feedback">         
                {{$errors->first('alamat_customer')}}
            </div>
            <br>

            <label for="kontak_customer">Kontak customer</label>
            <input value="{{$customer->kontak_customer}}" type="text" name="kontak_customer" class="form-control {{$errors->first('kontak_customer') ? "is-invalid": ""}}" placeholder=""/>
            <div class="invalid-feedback">   
                {{$errors->first('kontak_customer')}} 
            </div>
            <br>

            <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection