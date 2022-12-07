<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    public function index(){
        $mobil  = DB::select('select * from mobil where softDelete = 0');
        return View('mobil.mobil',compact(['mobil']));
    } 

    public function store(Request $request){
        $request->validate([
            'id_penjual' => 'required',
            'nama_mobil' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'isSold' => 'required',
        ]);
        DB::insert('INSERT INTO mobil(id_penjual, nama_mobil, harga, jenis, tahun, isSold) VALUES (:id_penjual, :nama_mobil, :harga, :jenis, :tahun, :isSold)', [
            'id_penjual' => $request->id_penjual,
            'nama_mobil' => $request->nama_mobil,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'isSold' => $request->isSold
        ]);
        return redirect('/mobil');
    }   

    public function edit($id_mobil){
        $mobil = mobil::where('id_mobil',$id_mobil)->first();
    
        return View('mobil.edit',compact(['mobil']));
    }

    public function update($id_mobil, Request $request){
        $request->validate([
            'id_penjual' => 'required',
            'nama_mobil' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'isSold' => 'required',
        ]);
        DB::update('UPDATE mobil SET id_penjual = :id_penjual, nama_mobil = :nama_mobil, harga = :harga, jenis = :jenis, tahun = :tahun, isSold = :isSold WHERE id_mobil = :id_mobil',[
            'id_mobil' => $id_mobil,
            'id_penjual' => $request->id_penjual,
            'nama_mobil' => $request->nama_mobil,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'isSold' => $request->isSold
        ]);
        return redirect('/mobil');
    }

    public function destroy($id_mobil){
        DB::delete('DELETE FROM mobil WHERE id_mobil = :id_mobil', ['id_mobil' => $id_mobil]);
        return redirect('/mobil');
    }

    public function cari(Request $re){
        $daftar  = DB::table('carlist')->where('nama_mobil', '=',$re->cari)->get();
        return View('welcome',compact(['daftar']));
    }

    public function soft($id_mobil){
        DB::table('mobil')->where('id_mobil', $id_mobil)->update(['softDelete' =>'1']);
        return redirect('/mobil');
    }
    public function restore(){
        DB::table('mobil')->update(['softDelete' => '0']);
        return redirect('/mobil');
    }
}
