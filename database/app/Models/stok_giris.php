<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok_giris extends Model
{
    use HasFactory;

    protected $table = 'stok_giris';
    protected $fillable = ['depo_id','giris_tarihi','user'];
    protected $guarded = ['id'];

}
