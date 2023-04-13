<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\postingan;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'deskripsi',
        'foto',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function postingan()
    {
        return $this->hasMany(postingan::class);
    }
    protected $attributes = [
        'is_banned' => false,
    ];
    public function banned()
    {
        $this->is_banned = true;
        $this->save();
    }
      /**
     * Unbanned the user.
     *
     * @return void
     */
    public function unbanned()
    {
        $this->is_banned = false;
        $this->save();
    }
    public function getIsbannedfAttribute($value)
{
    return $value ? 'Banned' : 'Aktif';
}
public function komen()
{
    return $this->hasMany(Komen::class);
}

public function like()
{
    return $this->hasMany(Like::class);
}
}
