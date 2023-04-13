<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $table = 'like';
    protected $fillable = ['user_id','komen_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komen()
    {
        return $this->belongsTo(Komen::class);
    }
}
