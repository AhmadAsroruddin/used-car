<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function index(){
        $daftar  = DB::table('mobil')->join('penjual', 'mobil.id_penjual','=','penjual.id')->select('mobil.*', 'penjual.*')->where('status', '=','Dijual')->get();
        return View('welcome',compact(['daftar']));
        // $daftar  = DB::table('mobil')->where('status', '=','Dijual')->get();
        // return View('welcome',compact(['daftar']));
    } 

    public function sold(){
        $daftar  = DB::table('mobil')->join('pembeli', 'mobil.id','=','pembeli.id_mobil')->select('mobil.*', 'pembeli.*')->get();
        return View('mobil_terjual.index',compact(['daftar']));
    }
}
