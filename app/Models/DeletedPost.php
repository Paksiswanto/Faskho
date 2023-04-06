<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeletedPost extends Model
{
    use HasFactory;

    public function markAsRead($id)
{
    DeletedPost::markAsRead($id);
    return redirect()->back();
}
public function getCreatedAtAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $value);
}
}
