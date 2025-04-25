<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'comment_user_item')->withTimestamps();
    }

    public function items()
    {
        return $this->belongsToMany(Item::class , 'comment_user_item')->withTimestamps();
    }
}
