@extends("layouts.global")
@section("title") Pengadaan
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('pengadaan_transactions.store')}}" method="POST">

        @csrf

        <table class="table table-bordered">
            <tr>
                <label for="kode_pengadaan">Kode Pengadaan</label>
                <input  value="{{old('kode_pengadaan')}}" class="form-control {{$errors->first('kode_pengadaan') ? "is-invalid": ""}}" placeholder="" type="text" name="kode_pengadaan" id="kode_pengadaan"/>
                <br>

                <label for="id_supplier">Supplier</label>
                <select id="id_supplier" name="id_supplier" class="form-control" required>
                    <option value="">Pilih Supplier</option>
                    @foreach($suppliers as $suppliers)
                        <option value="{{$suppliers->id}}">{{$suppliers->nama_supplier}}</option>
                    @endforeach
                </select>
                <br>

                <td>
                    <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                    <input value="{{old('tanggal_pengadaan')}}" class="form-control {{$errors->first('tanggal_pengadaan') ? "is-invalid" : ""}}" type="date" name="tanggal_pengadaan" id="tanggal_pengadaan"/>
                    <div class="invalid-feedback">   
                        {{$errors->first('tanggal_pengadaan')}} 
                    </div>
                </td>
                <td>
                    <label for="status_cetak">status_cetak</label>
                    <select id="status_cetak" name="status_cetak" class="form-control" required>
                        <option value="">status_cetak</option>
                            <option value="BELUM CETAK">BELUM CETAK</option>
                            <option value="SUDAH CETAK">SUDAH CETAK</option>
                    </select>
                    <div class="invalid-feedback">         
                        {{$errors->first('status')}}       
                    </div> 
                </td>
            </tr>
        </table>
        
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>

@endsection