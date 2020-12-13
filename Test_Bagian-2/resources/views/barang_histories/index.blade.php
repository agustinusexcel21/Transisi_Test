@extends("layouts.global")
@section("title") History list @endsection
@section("content")

<div class="row">
    <div class="col-md-6">
        <form action="{{route('barang_histories.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Cari History"/>
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
            <th><b>ID History</b></th>
            <th><b>Supplier</b></th>
            <th><b>Tanggal Masuk</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>

    <tbody>
        @foreach($barang_histories as $barang_histroy)
            <tr>
                <td>{{$barang_histroy->id}}</td>
                <td>{{$barang_histroy->supplier['nama_supplier']}}</td>
                <td>{{$barang_histroy->tanggal_masuk}}</td>
                <td>
                    <a class="btn btn-info text-white btn-sm" href="{{route('barang_histories.edit',['id'=>$barang_histroy->id])}}">Edit</a>
                    
                    <form onsubmit="return confirm('Delete this Transaction permanently?')" class="d-inline" action="{{route('barang_histories.destroy', ['id' => $barang_histroy->id ])}}" method="POST">
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
<form action="{{route('barang_histories.create')}}">
    <input type="submit" value="Input History" />
</form>

@endsection