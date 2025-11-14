<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depolar extends Model
{
    //use HasFactory;

    protected $table = 'depolar';
    protected $fillable = ['depo_adi','user'];
    protected $guarded = ['id'];

}
