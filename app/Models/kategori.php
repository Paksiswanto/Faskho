<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $dates = ['created_at'];

    public function postingan()
    {
        return $this->hasMany(postingan::class);
    }
}
