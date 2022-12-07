<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey = "id_pembeli";
    protected $guarded = [];
    use HasFactory;
}
