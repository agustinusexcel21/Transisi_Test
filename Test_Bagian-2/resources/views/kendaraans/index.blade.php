@extends("layouts.global")
@section("title") Kendaraan list @endsection
@section("content")

<div class="row">
    <div class="col-md-6">
        <form action="{{route('kendaraans.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Cari kendaraan"/>
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
            <th><b>ID kendaraan</b></th>
            <th><b>Pemilik</b></th>
            <th><b>No Polisi</b></th>
            <th><b>Merk Kendaraan</b></th>
            <th><b>Tipe Kendaraan</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>

    <tbody>
        @foreach($kendaraans as $kendaraan)
            <tr>
                <td>{{$kendaraan->id}}</td>
                <td>{{$kendaraan->customer['nama_customer']}}</td>
                <td>{{$kendaraan->no_polisi}}</td>
                <td>{{$kendaraan->merk}}</td>
                <td>{{$kendaraan->tipe}}</td>
                <td>
                    <a class="btn btn-info text-white btn-sm" href="{{route('kendaraans.edit',['id'=>$kendaraan->id])}}">Edit</a>
                    
                    <form onsubmit="return confirm('Delete this kendaraan permanently?')" class="d-inline" action="{{route('kendaraans.destroy', ['id' => $kendaraan->id ])}}" method="POST">
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
<form action="{{route('kendaraans.create')}}">
    <input type="submit" value="Tambah kendaraan" />
</form>

<br/>
	Halaman : {{ $kendaraans->currentPage() }} <br/>
	Jumlah Data : {{ $kendaraans->total() }} <br/>
	Data Per Halaman : {{ $kendaraans->perPage() }} <br/>
<br/>
{{ $kendaraans->links() }}

@endsection