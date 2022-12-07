<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariController extends Controller
{
    public function index($keyword){
        $cari  = DB::select('select * from mobil where nama_mobil LIKE :keyword', ['keyword' => $keyword]);
        return View('cari.cari',compact(['cari']));
    } 

   
}
