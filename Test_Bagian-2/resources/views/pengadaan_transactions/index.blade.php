@extends("layouts.global")
@section("title") Pengadaan list @endsection
@section("content")

<div class="row">
    <div class="col-md-6">
        <form action="{{route('pengadaan_transactions.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Cari Pengadaan"/>
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><b>Kode Pengadaan</b></th>
            <th><b>Supplier</b></th>
            <th><b>Tanggal Pengadaan</b></th>
            <th><b>Status Cetak</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>

    <tbody>
        @foreach($pengadaan_transactions as $pengadaan_transaction)
            <tr>
                <td>{{$pengadaan_transaction->kode_pengadaan}}</td>
                <td>{{$pengadaan_transaction->supplier['nama_supplier']}}</td>
                <td>{{$pengadaan_transaction->tanggal_pengadaan}}</td>
                <td>{{$pengadaan_transaction->status_cetak}}</td>
                <td>
                    <a class="btn btn-info text-white btn-sm" href="{{route('pengadaan_details.index',['id'=>$pengadaan_transaction->id])}}">Detail</a>
                    <a class="btn btn-info text-white btn-sm" href="">Cetak</a>
                    
                    <form onsubmit="return confirm('Delete this Transaction permanently?')" class="d-inline" action="{{route('pengadaan_transactions.destroy', ['id' => $pengadaan_transaction->id ])}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"> 
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
        @endforeach
        @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
    </tbody>
</table>
<form action="{{route('pengadaan_transactions.create')}}">
    <input type="submit" value="Buat Pengadaan" />
</form>

@endsection