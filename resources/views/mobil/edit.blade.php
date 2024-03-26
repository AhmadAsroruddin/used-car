@extends('layouts.app')

@section('content')
    

    <div class="container mb-3">
        <h1>EDIT</h1>
        <form action="/mobil/{{$mobil->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID Penjual</label>
                <input value="{{$mobil->id_penjual}}" type="text" class="form-control" name="id_penjual" id="exampleInputEmail1" placeholder="id Penjual">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input value="{{$mobil->nama_mobil}}" type="text"class="form-control" name="nama_mobil" id="exampleInputEmail1" placeholder="Nama Mobil">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input value="{{$mobil->harga}}" type="text"class="form-control" name="harga" id="exampleInputEmail1" placeholder="Harga">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                <input value="{{$mobil->jenis}}" type="text"class="form-control" name="jenis" id="exampleInputEmail1" placeholder="Jenis">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tahun</label>
                <input value="{{$mobil->tahun}}" type="text"class="form-control" name="tahun" id="exampleInputEmail1" placeholder="Tahun">
                
            </div>
            <select name="status" class="form-select">
                <option value="">Sudah Terjual atau belum?</option>
                <option value="dijual" @if($mobil->status == "Dijual") selected @endif >Dijual</option>
                <option value="terjual" @if($mobil->status == "terjual") selected @endif>Terjual</option>
            </select><br>
            <input type="submit" name="Submit" value="save" class="btn btn-primary">
        </form>
    </div>

@endsection