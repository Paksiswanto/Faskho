<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedPost extends Model
{
    use HasFactory;

    public function markAsRead($id)
{
    DeletedPost::markAsRead($id);
    return redirect()->back();
}

}
