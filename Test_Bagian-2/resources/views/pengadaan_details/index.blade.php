@extends("layouts.global")
@section("title") Detail Pengadaan @endsection
@section("content")

<div class="row">
    <div class="col-md-6">
        <form action="{{route('pengadaan_details.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Cari Detail Pengadaan"/>
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
            <th><b>Sparepart</b></th>
            <th><b>Satuan</b></th>
            <th><b>Jumlah Sparepart</b></th>
            <th><b>Waktu Pesan</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>

    <tbody>
        @foreach($pengadaan_details as $pengadaan_detail)
            <tr>
                <td>{{$pengadaan_detail->pengadaan_transaction['kode_pengadaan']}}</td>
                <td>{{$pengadaan_detail->sparepart['nama_sparepart']}}</td>
                <td>{{$pengadaan_detail->satuan}}</td>
                <td>{{$pengadaan_detail->jumlah_sparepart}}</td>
                <td>{{$pengadaan_detail->created_at}}</td>
                <td>{{$pengadaan_detail->status_cetak}}</td>
                <td>                    
                    <form onsubmit="return confirm('Delete this Transaction permanently?')" class="d-inline" action="{{route('pengadaan_details.destroy', ['id' => $pengadaan_detail->id ])}}" method="POST">
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
<form action="{{route('pengadaan_details.create')}}">
    <input type="submit" value="Buat Pengadaan" />
</form>

@endsection