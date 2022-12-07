@extends('layouts.app')

<form action="/cari" method="POST">
    @csrf
    <div class="mb-3">
        <input type="text" class="form-control" name="cari" id="exampleInputEmail1" placeholder="Cari">
        
    </div>
    
    <input type="submit" name="Submit" value="save" class="btn btn-primary">
</form>
@section('content')    
    <table border="1" class="table table-hover">
        <tr>
            <th>Mobil</th>
            <th>Status</th>
            <th>Penjual</th>
            <th>id_penjual</th>
        </tr>
        @foreach($cari as $m)
            <tr>
                <td>{{$m->nama_mobil}}</td>
                <td>{{$m->isSold}}</td>
                <td>{{$m->nama_penjual}}</td>
                <td>{{$m->id_penjual}}</td>
                
            </tr>
        @endforeach
    </table>
@endsection