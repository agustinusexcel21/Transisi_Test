@extends("layouts.global")
@section("title") History Barang
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('barang_histories.store')}}" method="POST">

        @csrf

        <table class="table table-bordered">
            <tr>
                <label for="id_supplier">Supplier</label>
                <select id="id_supplier" name="id_supplier" class="form-control" required>
                    <option value="">Pilih Supplier</option>
                    @foreach($suppliers as $suppliers)
                        <option value="{{$suppliers->id}}">{{$suppliers->nama_supplier}}</option>
                    @endforeach
                </select>
                <br>

                <td>
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input value="{{old('tanggal_masuk')}}" class="form-control {{$errors->first('tanggal_masuk') ? "is-invalid" : ""}}" type="date" name="tanggal_masuk" id="tanggal_masuk"/>
                    <div class="invalid-feedback">   
                        {{$errors->first('tanggal_masuk')}} 
                    </div>
                </td>
            </tr>
        </table>
        
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>

@endsection