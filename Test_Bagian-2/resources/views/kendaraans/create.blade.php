@extends("layouts.global")
@section('footer-scripts')  
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6rc.0/css/select2.min.css" rel="stylesheet" />  
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6rc.0/js/select2.min.js"></script> 
<script> 
    $('#customers').select2({   
        ajax: {     
            url: 'http://siato/ajax/customers/search',     
            processResults: function(data){       
                return {         
                    results: data.map(function(item){return {id: item.id, text: item.nama_customer} })       
                }     
            }   
        } 
    }); 
</script>
@endsection
@section("title") Create New Kendaraan 
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('kendaraans.store')}}" method="POST">

        @csrf
        <label for="id_customer">Pemilik</label>
        <select id="id_customer" name="id_customer" class="form-control" required>
            <option value="">Pilih Pemilik</option>
            @foreach($customers as $customers)
            <option value="{{$customers->id}}">{{$customers->nama_customer}}</option>
            @endforeach
        </select>
        <br>

        <label for="no_polisi">No Polisi</label>
        <input  value="{{old('no_polisi')}}" class="form-control {{$errors->first('no_polisi') ? "is-invalid": ""}}" placeholder="Nama kendaraan" type="text" name="no_polisi" id="no_polisi"/>
        <div class="invalid-feedback">   
            {{$errors->first('no_polisi')}} 
        </div>
        <br>

        <label for="merk">Merk Kendaraan</label>
        <input  value="{{old('merk')}}" class="form-control {{$errors->first('merk') ? "is-invalid": ""}}" placeholder="Nama kendaraan" type="text" name="merk" id="merk"/>
        <div class="invalid-feedback">   
            {{$errors->first('merk')}}
        </div>
        <br>

        <label for="tipe">Tipe Kendaraan</label>
        <input  value="{{old('tipe')}}" class="form-control {{$errors->first('tipe') ? "is-invalid": ""}}" placeholder="Nama kendaraan" type="text" name="tipe" id="tipe"/>
        <div class="invalid-feedback">   
            {{$errors->first('tipe')}}
        </div>
        <br>
        
        <hr class="my-3">
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>
@endsection