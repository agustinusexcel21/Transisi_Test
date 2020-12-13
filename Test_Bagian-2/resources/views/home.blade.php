@extends('layouts.global')
@section("title") Home @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SELAMAT DATANG</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
    </div>
</div>
<hr class="my-3">

<table class="table table-bordered">
    <thead>
    <h1>Data Cabang</h1>
        <tr>@foreach($cabangs as $cabang)
            <th>
                <b>
                    Nama Cabang: {{$cabang->nama_cabang}}
                    <pre></pre>
                    Alamat Cabang: {{$cabang->alamat_cabang}}
                </b>
            </th>
            @endforeach
        </tr>
    </thead>
</table>

<table class="table table-bordered">
    <thead>
    <h1>Data Sparepart</h1>
        <tr>@foreach($spareparts as $sparepart)
            <th>
                <b>
                    Nama Sparepart: {{$sparepart->nama_sparepart}}
                    <pre></pre>
                    @if($sparepart->gambar_sparepart)
                        <img src="{{asset('storage/' . $sparepart->gambar_sparepart)}}" width="125px"/>
                    @else
                        No image
                    @endif
                    <pre></pre>
                    Harga: {{$sparepart->harga_jual}}
                    <pre></pre>
                    Stock: {{$sparepart->stock}}
                </b>
            </th>
            @endforeach
        </tr>
</table>
@endsection