@extends("layouts.global")
@section("title") Detail Kendaraan
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('kendaraan_details.store')}}" method="POST">

        @csrf

        <label for="id_penjualan" class="control-label col-md-3 col-sm-3 col-xs-12"> ID Transaksi </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="id_penjualan" name="id_penjualan" class="form-control" required>
                    <option value="">Pilih Kode Transaksi</option>
                    @foreach($penjualan_transactions as $penjualan_transactions)
                        <option value="{{$penjualan_transactions->id}}">{{$penjualan_transactions->kode_transaksi}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label for="id_pegawai">Pegawai Montir</label>
        <select id="id_pegawai" name="id_pegawai" class="form-control" required>
            <option value="">Pilih Montir</option>
            @foreach($users as $users)
            <option value="{{$users->id}}">{{$users->nama_pegawai}}</option>
            @endforeach
        </select>
        <br>

        <div class="form-group">
            <label for="id_kendaraan" class="control-label col-md-3 col-sm-3 col-xs-12"> Nama Sparepart </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="id_kendaraan" name="id_kendaraan" class="form-control" required>
                    <option value="">Pilih Kendaraan</option>
                    @foreach($kendaraans as $kendaraan)
                        <option value="{{$kendaraan->id}}">{{$kendaraan->no_polisi}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>

@endsection