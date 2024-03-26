<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjual;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    public function index(){
        $penjual  = DB::select('select * from penjual where deleted_at IS NULL');
        return View('penjual.penjual',compact(['penjual']));
    } 
    public function store(Request $request){
        $request->validate([
            'nama_penjual' => 'required',
            'nomor_telpon' => 'required',
            'alamat' => 'required',
        ]);
        DB::insert('INSERT INTO penjual(nama_penjual, nomor_telpon, alamat) VALUES (:nama_penjual, :nomor_telpon, :alamat)', [
            'nama_penjual' => $request->nama_penjual,
            'nomor_telpon' => $request->nomor_telpon,
            'alamat' => $request->alamat,
        ]);
        return redirect('/penjual')->with('success', 'Data berhasil ditambahkan');
    }   
    public function edit($id_penjual){
        $penjual = penjual::where('id',$id_penjual)->first();
    
        return View('penjual.edit',compact(['penjual']));
    }
    
    public function update($id_penjual, Request $request){
        $request->validate([
            'nama_penjual' => 'required',
            'nomor_telpon' => 'required',
            'alamat' => 'required',
        ]);
        DB::update('UPDATE penjual SET nama_penjual = :nama_penjual, nomor_telpon = :nomor_telpon, alamat = :alamat WHERE id = :id_penjual',[
            'id_penjual' => $id_penjual,
            'nama_penjual' => $request->nama_penjual,
            'nomor_telpon' => $request->nomor_telpon,
            'alamat' => $request->alamat
        ]);
        return redirect('/penjual')->with('success', 'Data berhasil dirubah');
    }
    public function destroy($id_penjual){
       
        DB::delete('DELETE FROM penjual WHERE id = :id_penjual', ['id_penjual' => $id_penjual]);
        DB::table('mobil')->where('id_penjual', $id_penjual)->delete();
        return redirect('/penjual')->with('success', 'Data berhasil dihapus');
    }

    public function soft($id){
        $penjual = penjual::find($id);
    	$penjual->delete();
        return redirect('/penjual');
    }

    public function restore(){
        penjual::withTrashed()->restore();
        return redirect('/penjual');
    }   
}
