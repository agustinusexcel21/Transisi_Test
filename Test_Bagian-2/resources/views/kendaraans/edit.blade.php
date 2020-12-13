@extends('layouts.global')
@section('title') Edit Kendaraan @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('kendaraans.update', ['id'=>$kendaraan->id])}}" method="POST">
        @csrf
            <input type="hidden" value="PUT" name="_method">

            <label for="id_customer">Pemilik</label>
            <select id="id_customer" name="id_customer" class="form-control" required>
                <option value="">Pilih Pemilik</option>
                    @foreach($customers as $customers)
                        <option value="{{$customers->id}}" {{$customers->id == $kendaraan->id_customer ? 'selected' : ''}}>{{$customers->nama_customer}}</option>
                    @endforeach
            </select>
            <br>

            <label for="no_polisi">No Polisi</label>
            <input value="{{$kendaraan->no_polisi}}" class="form-control {{$errors->first('no_polisi') ? "is-invalid": ""}}" placeholder="Nama Lengkap" type="text" name="no_polisi" id="no_polisi"/>
            <div class="invalid-feedback">   
                {{$errors->first('no_polisi')}} 
            </div>
            <br>

            <label for="merk">Merk kendaraan</label>
            <input value="{{$kendaraan->merk}}" type="text" name="merk" class="form-control {{$errors->first('merk') ? "is-invalid": ""}}" placeholder="Nama Lengkap"/>
            <div class="invalid-feedback">   
                {{$errors->first('merk')}} 
            </div>
            <br>

            <label for="tipe">Tipe kendaraan</label>
            <input value="{{$kendaraan->tipe}}" type="text" name="tipe" class="form-control {{$errors->first('tipe') ? "is-invalid": ""}}" placeholder="Nama Lengkap"/>
            <div class="invalid-feedback">   
                {{$errors->first('tipe')}} 
            </div>
            <br>

            <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection