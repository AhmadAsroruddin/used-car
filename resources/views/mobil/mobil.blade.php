@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="container mb-3">
               
                    <h2>Add Mobil</h2>
                    <form action="mobil/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID Penjual</label>
                            <input type="text" class="form-control" name="id_penjual" id="exampleInputEmail1" placeholder="id Penjual">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                            <input type="text"class="form-control" name="nama_mobil" id="exampleInputEmail1" placeholder="Nama Mobil">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text"class="form-control" name="harga" id="exampleInputEmail1" placeholder="Harga">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis</label>
                            <input type="text"class="form-control" name="jenis" id="exampleInputEmail1" placeholder="Jenis">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tahun</label>
                            <input type="text"class="form-control" name="tahun" id="exampleInputEmail1" placeholder="Tahun">
                            
                        </div>
                        
                        
                        <select name="isSold" class="form-select">
                            <option value="">Sudah Terjual atau belum?</option>
                            <option value="Dijual">Dijual</option>
                            <option value="terjual">Terjual</option>
                        </select><br>
                        <input type="submit" name="Submit" value="save" class="btn btn-primary">
                    </form>
                </div>
                <a href="/mobil/restore" class="btn btn-info">restore</a>

                <table border="1" class="table table-hover">
                    <tr>
                        <th>id_mobil</th>
                        <th>id_penjual</th>
                        <th>Nama Mobil</th>
                        <th>Harga</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>isSold</th>
                    </tr>
                    @foreach($mobil as $m)
                        <tr>
                            <td>{{$m->id_mobil}}</td>
                            <td>{{$m->id_penjual}}</td>
                            <td>{{$m->nama_mobil}}</td>
                            <td>{{$m->harga}}</td>
                            <td>{{$m->jenis}}</td>
                            <td>{{$m->tahun}}</td>
                            <td>{{$m->isSold}}</td>
                            <td>
                                <div class="btn-group">

                                    <a class="btn btn-warning" href="/mobil/{{$m->id_mobil}}/edit">Edit</a>
                                    <form action="/mobil/{{$m->id_mobil}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger" type="submit" value="delete">
                                    </form>
                                    <a class="btn btn-warning" href="/mobil/{{$m->id_mobil}}/soft">Soft Delete</a>
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

