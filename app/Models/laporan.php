<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];
    public function users()
    {
        return $this->belongsTo(user::class,'user_id','id');

    }
}
