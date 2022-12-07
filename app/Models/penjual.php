<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class penjual extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'penjual';
    protected $primaryKey = "id_penjual";
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
}
