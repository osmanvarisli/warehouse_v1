<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class birimler extends Model
{
    use HasFactory;
    protected $table = 'birimler';
    protected $fillable = ['birim','user'];
    protected $guarded = ['id'];
}
