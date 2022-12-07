@extends('layouts.app')

@section('content')
    

    <div class="container mb-3">
        <h1>EDIT</h1>
        <form action="/penjual/{{$penjual->id_penjual}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Penjual</label>
                <input value="{{$penjual->nama_penjual}}" type="text" class="form-control" name="nama_penjual" id="exampleInputEmail1" placeholder="Nama Penjual">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input value="{{$penjual->nomor_telpon}}" type="number" class="form-control" name="nomor_telpon" id="exampleInputEmail1" placeholder="Nomor Telepon">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input value="{{$penjual->alamat}}" type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat">
                
            </div>
            <input type="submit" name="Submit" value="save" class="btn btn-primary">
        </form>
    </div>

@endsection