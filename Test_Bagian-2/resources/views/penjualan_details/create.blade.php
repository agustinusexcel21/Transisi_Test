@extends("layouts.global")
@section("title") Transaction Detail
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('penjualan_details.store')}}" method="POST">

        @csrf

         <div class="form-group">

                    <label for="id_penjualan" class="control-label col-md-3 col-sm-3 col-xs-12"> ID Transaksi </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="id_penjualan" name="id_penjualan" class="form-control" required>
                            <option value="">Pilih Kode Transaksi</option>
                            @foreach($penjualan_transactions as $penjualan_transactions)
                            <option value="{{$penjualan_transactions->id}}" {{$penjualan_transactions->id==$id_penjualan?'selected':''}}>{{$penjualan_transactions->kode_transaksi}}</option>
                            @endforeach
                          </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id_sparepart" class="control-label col-md-3 col-sm-3 col-xs-12"> Nama Sparepart </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="id_sparepart" name="id_sparepart" class="form-control" required>
                            <option value="">Pilih Nama Sparepart</option>
                            @foreach($spareparts as $sparepart)
                            <option value="{{$sparepart->id}}">{{$sparepart->nama_sparepart}} Harga : Rp.{{$sparepart->harga_jual}}</option>
                            @endforeach
                          </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="jumlah_sparepart" class="control-label col-md-3 col-sm-3 col-xs-12"> Jumlah Sparepart </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="jumlah_sparepart" class="form-control col-md-7 col-xs-12" type="number" name="jumlah_sparepart" id="jumlah_sparepart">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="subtotal" class="control-label col-md-3 col-sm-3 col-xs-12"> Subtotal Sparepart </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="subtotal" class="form-control col-md-7 col-xs-12" type="number" name="subtotal" id="subtotal" readonly>
                    </div>
                  </div>
       
       <button class="btn btn-primary" type="reset">Reset</button>
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>

</div>


@endsection
@section('scripts')
<script>
    function hitungsubtotal(){
      var jumlah_sparepart=$('#jumlah_sparepart').val();
        var id_sparepart=$('#id_sparepart').val();
        if(id_sparepart){
          $.get('{{url('api/sparepart')}}/'+id,function(data){
            var total=data.sparepart.harga_jual*jumlah_sparepart;
            console.log(data,total);
            $('#subtotal').val(total);
          });        
        }
   
    }
  hitungsubtotal();
  $('#id_sparepart').change(function(){
    hitungsubtotal();
  });

  $('#jumlah_sparepart').keyup(function(){
    hitungsubtotal();
  });
</script>
@endsection