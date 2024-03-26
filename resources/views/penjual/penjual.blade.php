@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="container mb-3">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2>Add Penjual</h2>
                    <a href="/penjual/restoree">restore</a>
                    <form action="penjual/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Penjual</label>
                            <input type="text" class="form-control" name="nama_penjual" id="exampleInputEmail1" placeholder="Nama Penjual">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="nomor_telpon" id="exampleInputEmail1" placeholder="Nomor Telepon">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat">
                            
                        </div>
                        <input type="submit" name="Submit" value="save" class="btn btn-primary">
                    </form>
                </div>

                <table border="1" class="table table-hover">
                    <tr>
                        <th>ID PENJUAL</th>
                        <th>Nama Penjual</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                    </tr>
                    @foreach($penjual as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->nama_penjual}}</td>
                            <td>{{$m->nomor_telpon}}</td>
                            <td>{{$m->alamat}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="/penjual/{{$m->id}}/edit">Edit</a>
                                    <form action="/penjual/{{$m->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger" type="submit" value="delete">
                                    </form>
                                    
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">

        
        
    </div>
@endsection

