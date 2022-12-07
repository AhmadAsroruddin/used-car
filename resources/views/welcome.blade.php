@extends('layouts.app')

@section('content')

<div class="container">


    <form action="/daftar/cari" method="GET">
                    
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="cari" id="exampleInputEmail1" placeholder="Cari">
            
        </div>
        
        <input type="submit" name="Submit" value="save" class="btn btn-primary">
    </form>
    
    
  
        <h2>Pencarian tidak ditemukan</h2>

        <table border="1" class="table table-hover">
            <tr>
                <th>Mobil</th>
                <th>Harga</th>
                <th>Jenis</th>
                <th>Tahun</th>
                <th>Penjual</th>
                <th>Nomor Telpon</th>
                <th>Alamat</th>
            </tr>
            @foreach($daftar as $m)
                <tr>
                    <td>{{$m->nama_mobil}}</td>
                    <td>{{$m->harga}}</td>
                    <td>{{$m->jenis}}</td>
                    <td>{{$m->tahun}}</td>
                    <td>{{$m->nama_penjual}}</td>
                    <td>{{$m->nomor_telpon}}</td>
                    <td>{{$m->alamat}}</td>
                    
                </tr>
            @endforeach
        </table>
    }
    
</div>
@endsection