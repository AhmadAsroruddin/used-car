<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function index(){
        $daftar  = DB::table('carlist')->where('isSold', '=','Dijual')->get();
        return View('welcome',compact(['daftar']));
    } 

    public function sold(){
        $daftar  = DB::table('mobil')->join('pembeli', 'mobil.id_mobil','=','pembeli.id_mobil')->select('mobil.*', 'pembeli.*')->get();
        return View('mobil_terjual.index',compact(['daftar']));
    }
}
