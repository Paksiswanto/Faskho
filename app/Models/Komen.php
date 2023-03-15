<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $guarded = [];    
    protected $table = 'komen';
   
    public function user()
    {
    return $this->belongsto(User::class);
    }
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

    public function childs()
    {
        return $this->hasMany(komen::class,'parent');
    }



=======
>>>>>>> Stashed changes
    public function like()
    {
        $this->likes++;
        $this->save();
    }
<<<<<<< Updated upstream
=======
>>>>>>> 513289258eea037ec030f3575f44356d9816b805
>>>>>>> Stashed changes
}
