@extends('layouts.app')

@section('content')    
    <table border="1" class="table table-hover">
        <tr>
            <th>Mobil</th>
            <th>Pembeli</th>
            <th>Harga</th>
            
           
        </tr>
        @foreach($daftar as $m)
            <tr>
                <td>{{$m->nama_mobil}}</td>
                <td>{{$m->nama_pembeli}}</td>
                <td>{{$m->harga}}</td>
                
            </tr>
        @endforeach
    </table>
@endsection