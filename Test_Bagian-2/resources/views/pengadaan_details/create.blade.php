@extends("layouts.global")
@section("title") Pengadaan Detail
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('pengadaan_details.store')}}" method="POST">

        @csrf
        <label for="id_pengadaan">Kode Pengadaan</label>
        <select id="id_pengadaan" name="id_pengadaan" class="form-control" required>
            <option value="">Pilih Pengadaan</option>
            @foreach($pengadaan_transactions as $pengadaan_transactions)
            <option value="{{$pengadaan_transactions->id}}">{{$pengadaan_transactions->kode_pengadaan}}</option>
            @endforeach
        </select>
        <br>

                <label for="id_sparepart">Sparepart</label>
                <select id="id_sparepart" name="id_sparepart" class="form-control" required>
                    <option value="">Pilih Sparepart</option>
                    @foreach($spareparts as $spareparts)
                        <option value="{{$spareparts->id}}">{{$spareparts->nama_sparepart}}</option>
                    @endforeach
                </select>
                <br>

                <label for="satuan">Satuan Sparepart</label>
                <input  value="{{old('satuan')}}" class="form-control {{$errors->first('satuan') ? "is-invalid": ""}}" placeholder="pack, box, piece, dll..." type="text" name="satuan" id="satuan"/>
                <div class="invalid-feedback">   
                    {{$errors->first('satuan')}} 
                </div>
                <br>

                <label for="jumlah_sparepart">Jumlah Sparepart</label>
                <input  value="{{old('jumlah_sparepart')}}" class="form-control {{$errors->first('jumlah_sparepart') ? "is-invalid": ""}}" placeholder="" type="number" name="jumlah_sparepart" id="jumlah_sparepart"/>
                <div class="invalid-feedback">   
                    {{$errors->first('jumlah_sparepart')}} 
                </div>
                <br>

        <table class="table table-bordered">
            <tr>
                

        <hr class="my-3">
        <div class="col-md-8">
            <div class="my-form">
            <label for="nama_sparepart">Sparepart</label>
                <a class="add-box" href="#"><img src="{{ asset('image/plus.png') }}" style="height:25px; width:20px;"></a><br />
                    <p class="text-box">
                <hr class="my-3">
            </div>
        </div>
            </tr>
        </table>
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>


@endsection