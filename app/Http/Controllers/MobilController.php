<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    public function index(){
        $mobil  = DB::select('select * from mobil');
        return View('mobil.mobil',compact(['mobil']));
    } 

    public function store(Request $request){
        $penjual = DB::select('select * from penjual where id = :id_penjual', ['id_penjual' => $request->id_penjual]);

        if(count($penjual) == 0){
            return redirect('/mobil')->with('error', 'Penjual tidak ditemukan');
        } else{
            $request->validate([
                'id_penjual' => 'required',
                'nama_mobil' => 'required',
                'harga' => 'required',
                'jenis' => 'required',
                'tahun' => 'required',
                'status' => 'required',
            ]);
            DB::insert('INSERT INTO mobil(id_penjual, nama_mobil, harga, jenis, tahun, status) VALUES (:id_penjual, :nama_mobil, :harga, :jenis, :tahun, :status)', [
                'id_penjual' => $request->id_penjual,
                'nama_mobil' => $request->nama_mobil,
                'harga' => $request->harga,
                'jenis' => $request->jenis,
                'tahun' => $request->tahun,
                'status' =>$request->status
            ]);
            return redirect('/mobil')->with('success', 'Mobil berhasil ditambahkan');
        }
       
    }   

    public function edit($id_mobil){
        $mobil = mobil::where('id',$id_mobil)->first();
    
        return View('mobil.edit',compact(['mobil']));
    }

    public function update($id_mobil, Request $request){
        $penjual = DB::select('select * from penjual where id = :id_penjual', ['id_penjual' => $request->id_penjual]);
        if(count($penjual) == 0){
            return redirect('/mobil')->with('error', 'Data gagal diubah, Penjual tidak ditemukan');
        } else{
            $request->validate([
                'id_penjual' => 'required',
                'nama_mobil' => 'required',
                'harga' => 'required',
                'jenis' => 'required',
                'tahun' => 'required',
                'status' => 'required',
            ]);
            DB::update('UPDATE mobil SET id_penjual = :id_penjual, nama_mobil = :nama_mobil, harga = :harga, jenis = :jenis, tahun = :tahun, status = :status WHERE id = :id_mobil',[
                'id_mobil' => $id_mobil,
                'id_penjual' => $request->id_penjual,
                'nama_mobil' => $request->nama_mobil,
                'harga' => $request->harga,
                'jenis' => $request->jenis,
                'tahun' => $request->tahun,
                'status' => $request->status
            ]);
            return redirect('/mobil')->with('success', 'Data berhasil diubah');
        }
        
    }

    public function destroy($id_mobil){
        DB::delete('DELETE FROM mobil WHERE id = :id_mobil', ['id_mobil' => $id_mobil]);
        DB::delete('DELETE FROM pembeli WHERE id_mobil = :id_mobil', ['id_mobil' => $id_mobil] );
        return redirect('/mobil');
    }

    public function cari(Request $re){
        $daftar  = DB::table('mobil')->join('penjual', 'mobil.id_penjual','=','penjual.id')->select('mobil.*', 'penjual.*')->where('nama_mobil', 'LIKE','%'.$re->cari.'%')->get();

        // $daftar  = DB::table('mobil')->where('nama_mobil', 'LIKE', '%'.$re->cari.'%')->get();
        return View('welcome',compact(['daftar']));
    }

    public function soft($id_mobil){
        DB::table('mobil')->where('id_mobil', $id_mobil)->update(['softDelete' =>'1']);
        return redirect('/mobil');
    }
    public function restore(){
        // DB::table('mobil')->update(['softDelete' => '0']);
        return redirect('/mobil');
    }
}
