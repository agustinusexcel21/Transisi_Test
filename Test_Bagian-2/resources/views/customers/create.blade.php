@extends("layouts.global")
@section("title") Create New Customer 
@endsection
@section("content")
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('customers.store')}}" method="POST">

        @csrf

        <label for="nama_customer">Nama Customer</label>
        <input  value="{{old('nama_customer')}}" class="form-control {{$errors->first('nama_customer') ? "is-invalid": ""}}" placeholder="Nama customer" type="text" name="nama_customer" id="nama_customer"/>
        <div class="invalid-feedback">   
            {{$errors->first('nama_customer')}} 
        </div>
        <br>

        <label for="alamat_customer">Alamat Customer</label>
        <textarea name="alamat_customer" id="alamat_customer" class="form-control {{$errors->first('alamat_customer') ? "is-invalid": ""}}">{{old('alamat_customer')}} </textarea>
        <div class="invalid-feedback">         
            {{$errors->first('alamat_customer')}}
        </div> 
        <br>

        <label for="kontak_customer">No Telepon</label>
        <br>
        <input value="{{old('kontak_customer')}}" type="text" name="kontak_customer" class="form-control {{$errors->first('kontak-pegawai') ? "is-invalid" : ""}} "> 
        <div class="invalid-feedback">         
            {{$errors->first('kontak_customer')}}       
        </div> 
        <br>

        
        
        <hr class="my-3">
        
        <input class="btn btn-primary" type="submit" value="SIMPAN"/> 
    </form>
</div>
@endsection