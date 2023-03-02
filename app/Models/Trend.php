<?php

namespace App\Models;

Use App\Models\Postingan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function postingan(){
        return $this->belongsTo(postingan::class);
    }
}
