<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class urunler extends Model
{
    use HasFactory;


    protected $table = 'urunler';
    protected $fillable = ['urun_adi','birim','barkod','tedarikci_bilgileri','aciklama','kategori_id','resim','user'];
    protected $guarded = ['id'];


}
