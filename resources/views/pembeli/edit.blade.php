@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="container mb-3">
                    <h2>Edit Pembeli</h2>
                    <form action="/pembeli/{{$pembeli->id}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                            <input value="{{$pembeli->nama_pembeli}}" type="text" class="form-control" name="nama_pembeli" id="exampleInputEmail1" placeholder="Nama Pembeli">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID Mobil</label>
                            <input value="{{$pembeli->id_mobil}}" type="text" class="form-control" name="id_mobil" id="exampleInputEmail1" placeholder="ID Mobil">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Telpon</label>
                            <input value="{{$pembeli->nomor_telpon}}" type="text" class="form-control" name="nomor_telpon" id="exampleInputEmail1" placeholder="Nomor Telpon">
                        </div>
                        <input type="submit" name="Submit" value="save" class="btn btn-primary">
                    </form>
                </div>

                
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">

        
        
    </div>
@endsection

