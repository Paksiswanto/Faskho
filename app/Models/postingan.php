<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postingan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(user::class,'user_id','id');

    }

    public function kategoris()
    {
        return $this->belongsTo(kategori::class,'kategori_id','id');

    }


}
