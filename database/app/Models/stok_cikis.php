<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok_cikis extends Model
{
    use HasFactory;

    protected $table = 'stok_cikis';
    protected $fillable = ['depo_id','cikis_tarihi','user'];
    protected $guarded = ['id'];
}
