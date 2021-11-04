<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Video extends Model
{
    use HasFactory;

    // 1:n INVERSA CON TABLA USERS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1:n POLIMORFICA INVERSA CON TABLA COMMENTS
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // n:n POLIMORFICA CON TABLA TAGS
    public function posts()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
