<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok_hareket extends Model
{
    use HasFactory;


    protected $table = 'stok_hareket';
    protected $fillable = ['stok_id','islem','urun_id','adet','user'];
    protected $guarded = ['id'];

}
