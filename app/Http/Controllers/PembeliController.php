<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembeli;
use Illuminate\Support\Facades\DB;

class PembeliController extends Controller
{
    public function index(){
        $pembeli  = DB::select('select * from pembeli');
        return View('pembeli.pembeli',compact(['pembeli']));
    } 

    public function store(Request $request){
        $cek = DB::select('select status from mobil where id = :id_mobil limit 1',['id_mobil' => $request->id_mobil]);
        
       
        if(count($cek) == 0){
            return redirect()->back()->with('error', 'Mobil dengan ID tersebut tidak ada');
        } else{
            $mobil = $cek[0];
            if($mobil->status == "terjual"){
                return redirect()->back()->with('error', 'Mobil telah terjual, anda tidak bisa membelinya');
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
                DB::table('mobil')->where('id', $request->id_mobil)->update(['status' =>'terjual']);

                return redirect('/pembeli')->with('success', 'Mobil berhasil dibeli');
            }
        }
     
    }  

    public function edit($id_pembeli){
        $pembeli = pembeli::where('id',$id_pembeli)->first();
    
        return View('pembeli.edit',compact(['pembeli']));
    }

    public function update($id_pembeli, Request $request){
       

            $request->validate([
                'nama_pembeli' => 'required',
                'id_mobil' => 'required',
                'nomor_telpon' => 'required',
                
            ]);
            DB::update('UPDATE pembeli SET nama_pembeli = :nama_pembeli, id_mobil = :id_mobil, nomor_telpon = :nomor_telpon WHERE id = :id_pembeli',[
                'id_pembeli' => $id_pembeli,
                'nama_pembeli' => $request->nama_pembeli,
                'id_mobil' => $request->id_mobil,
                'nomor_telpon' => $request->nomor_telpon,
          
            ]);
            
            return redirect('/pembeli')->with('success', 'Data Berhasil dirubah');
        
    }
    public function destroy($id_pembeli){
        $pembeli = pembeli::where('id',$id_pembeli)->first();

        DB::delete('DELETE FROM pembeli WHERE id = :id_pembeli', ['id_pembeli' => $id_pembeli]);
        DB::table('mobil')->where('id', $pembeli->id_mobil)->update(['status' =>'Dijual']);
        return redirect('/pembeli')->with('success', 'Data berhasil dihapus');
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
