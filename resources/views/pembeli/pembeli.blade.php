@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="container mb-3">
                    <h2>Add Pembeli</h2>
                    <form action="pembeli/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" name="nama_pembeli" id="exampleInputEmail1" placeholder="Nama Pembeli">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID Mobil</label>
                            <input type="text" class="form-control" name="id_mobil" id="exampleInputEmail1" placeholder="ID Mobil">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" name="nomor_telpon" id="exampleInputEmail1" placeholder="Nomor Telpon">
                        </div>
                      

                        <input type="submit" name="Submit" value="save" class="btn btn-primary">
                    </form>
                </div>
                <a href="/mobil/restore" class="btn btn-info">restore</a>

                <table border="1" class="table table-hover">
                    <tr>
                        <th>ID Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>ID Mobil yang dibeli</th>
                        <th>Nomor Telepon</th>
                       
                    </tr>
                    @foreach($pembeli as $m)
                        <tr>
                            <td>{{$m->id_pembeli}}</td>
                            <td>{{$m->nama_pembeli}}</td>
                            <td>{{$m->id_mobil}}</td>
                            <td>{{$m->nomor_telpon}}</td>
                         
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="/pembeli/{{$m->id_pembeli}}/edit">Edit</a>
                                    <form action="/pembeli/{{$m->id_pembeli}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger" type="submit" name="Submit" value="delete">
                                    </form>
                                    <a class="btn btn-warning" href="/pembeli/{{$m->id_pembeli}}/soft">Soft Delete</a>
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

