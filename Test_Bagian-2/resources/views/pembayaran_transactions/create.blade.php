@extends("layouts.global")
@section("title") Pembayaran
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('pembayaran_transactions.store')}}" method="POST">

        @csrf

        <table class="table table-bordered">
            <tr>
                <label for="id_pegawai">Pegawai</label>
                <select id="id_pegawai" name="id_pegawai" class="form-control" required>
                    <option value="">Pilih Pegawai</option>
                    @foreach($users as $users)
                        <option value="{{$users->id}}">{{$users->nama_pegawai}}</option>
                    @endforeach
                </select>
                <br>

                <label for="id_cabang">Cabang</label>
                <select id="id_cabang" name="id_cabang" class="form-control" required>
                    <option value="">Pilih Cabang</option>
                    @foreach($cabangs as $cabangs)
                        <option value="{{$cabangs->id}}">{{$cabangs->nama_cabang}}</option>
                    @endforeach
                </select>
                <br>


                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                    <input value="{{old('tanggal_pembayaran')}}" class="form-control {{$errors->first('tanggal_pembayaran') ? "is-invalid" : ""}}" type="date" name="tanggal_pembayaran" id="tanggal_pembayaran"/>
                    <div class="invalid-feedback">   
                        {{$errors->first('tanggal_pembayaran')}} 
                    </div>
                <label for="total_biaya" class="control-label col-md-3 col-sm-3 col-xs-12"> Total Biaya </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="total_biaya" class="form-control col-md-7 col-xs-12" type="number" name="total_biaya" id="total_biaya" readonly>
                    </div>
                

                <label for="diskon" class="control-label col-md-3 col-sm-3 col-xs-12"> Diskon </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="diskon" class="form-control col-md-7 col-xs-12" type="number" name="diskon" id="diskon">
                    </div>

                <label for="total_akhir" class="control-label col-md-3 col-sm-3 col-xs-12"> Total </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="total_akhir" class="form-control col-md-7 col-xs-12" type="number" name="total_akhir" id="total_akhir">
                    </div>
            </tr>
        </table>
        
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>

@endsection