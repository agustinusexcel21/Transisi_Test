@extends("layouts.global")
@section("title") Customer list @endsection
@section("content")

<div class="row">
    <div class="col-md-6">
        <form action="{{route('customers.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Cari customer"/>
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
            <th><b>ID customer</b></th>
            <th><b>Nama customer</b></th>
            <th><b>Alamat customer</b></th>
            <th><b>Kontak customer</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>

    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->nama_customer}}</td>
                <td>{{$customer->alamat_customer}}</td>
                <td>{{$customer->kontak_customer}}</td>
                <td>
                    <a class="btn btn-info text-white btn-sm" href="{{route('customers.edit',['id'=>$customer->id])}}">Edit</a>
                    
                    <form onsubmit="return confirm('Delete this suppli$customers permanently?')" class="d-inline" action="{{route('customers.destroy', ['id' => $customer->id ])}}" method="POST">
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

<table>
    <thead>
        <tr>
            <form action="{{route('customers.create')}}">
                <input type="submit" value="Tambah Customer"/>
            </form>
        </tr>
        <tr> | | </tr>
        <tr>
            <form action="{{route('kendaraans.index')}}">
                <input type="submit" value="Data Kendaraan" />
            </form>
        </tr>
    </thead>
</table>

<br/>
	Halaman : {{ $customers->currentPage() }} <br/>
	Jumlah Data : {{ $customers->total() }} <br/>
	Data Per Halaman : {{ $customers->perPage() }} <br/>
<br/>
{{ $customers->links() }}

@endsection