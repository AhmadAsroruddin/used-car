<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembeli;
use Illuminate\Support\Facades\DB;

class PembeliController extends Controller
{
    public function index(){
        $pembeli  = DB::select('select * from pembeli where softDelete = 0');
        return View('pembeli.pembeli',compact(['pembeli']));
    } 

    public function store(Request $request){
        $cek = DB::select('select isSold from mobil where id_mobil = :id_mobil',['id_mobil' => $request->id_mobil]);
        
        if($cek == "Terjual"){
            return redirect('/pembeli');
        } else {
            $request->validate([
                'nama_pembeli' => 'required',
                'id_mobil' => 'required',
                'nomor_telpon' => 'required',
            
            ]);
            DB::insert('INSERT INTO pembeli(nama_pembeli, id_mobil, nomor_telpon) VALUES (:nama_pembeli, :id_mobil, :nomor_telpon)', [
                'nama_pembeli' => $request->nama_pembeli,
                'id_mobil' => $request->id_mobil,
                'nomor_telpon' => $request->nomor_telpon,
                
            ]);
            DB::table('mobil')->where('id_mobil', $request->id_mobil)->update(['isSold' =>'Terjual']);
        }
    }  

    public function edit($id_pembeli){
        $pembeli = pembeli::where('id_pembeli',$id_pembeli)->first();
    
        return View('pembeli.edit',compact(['pembeli']));
    }

    public function update($id_pembeli, Request $request){
        $cek = DB::table('mobil')->where('id_mobil', $request->id_mobil)->get();
        if($cek->isSold == "Terjual"){
            return redirect('/pembeli');
        } else {

            $request->validate([
                'nama_pembeli' => 'required',
                'id_mobil' => 'required',
                'nomor_telpon' => 'required',
                'id_kredit' => 'required',
            ]);
            DB::update('UPDATE pembeli SET nama_pembeli = :nama_pembeli, id_mobil = :id_mobil, nomor_telpon = :nomor_telpon, id_kredit = :id_kredit WHERE id_pembeli = :id_pembeli',[
                'id_pembeli' => $id_pembeli,
                'nama_pembeli' => $request->nama_pembeli,
                'id_mobil' => $request->id_mobil,
                'nomor_telpon' => $request->nomor_telpon,
                'id_kredit' => $request->id_kredit
            ]);
        }
       
        
    }
    public function destroy($id_pembeli){
       
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id_pembeli]);
        
        return redirect('/pembeli');
    }
    public function soft($id_pembeli){
        DB::table('pembeli')->where('id_pembeli', $id_pembeli)->update(['softDelete' =>'1']);
        return redirect('/pembeli');
    }

    public function restore(){
        DB::table('pembeli')->update(['softDelete' => '0']);
        return redirect('/pembeli');
    }
}
