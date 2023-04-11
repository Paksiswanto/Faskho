<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'laporan'
    ];
    protected $guarded = [];
    protected $dates = ['created_at'];
}
