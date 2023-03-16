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
>>>>>>> Stashed changes

    public function childs()
    {
        return $this->hasMany(komen::class,'parent');
    }

<<<<<<< Updated upstream



=======
>>>>>>> Stashed changes
    public function like()
    {
        $this->likes++;
        $this->save();
    }

}
