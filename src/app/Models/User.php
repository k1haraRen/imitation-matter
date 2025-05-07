<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'postcode',
        'address',
        'building',
        'icon_url',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'comment_user_item')->withTimestamps();
    }

    public function favorites()
    {
        return $this->belongsToMany(Item::class, 'favorites');
    }
}
