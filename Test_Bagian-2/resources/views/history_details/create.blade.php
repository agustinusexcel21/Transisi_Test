@extends("layouts.global")
@section("title") History Detail
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('history_details.store')}}" method="POST">

        @csrf

        <table class="table table-bordered">
            <tr>
                <label for="id_barang_history">ID History</label>
                <select id="id_barang_history" name="id_barang_history" class="form-control" required>
                    <option value="">Pilih History</option>
                    @foreach($barang_histories as $barang_histories)
                        <option value="{{$barang_histories->id}}">{{$barang_histories->id}}</option>
                    @endforeach
                </select>
                <br>

                <label for="id_sparepart">Sparepart</label>
                <select id="id_sparepart" name="id_sparepart" class="form-control" required>
                    <option value="">Pilih History</option>
                    @foreach($spareparts as $spareparts)
                        <option value="{{$spareparts->id}}">{{$spareparts->nama_sparepart}}</option>
                    @endforeach
                </select>
                <br>

                <label for="id_sparepart">Satuan</label>
                <input type="number" name="satuan" id="satuan">
            </tr>
        </table>
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>


@endsection