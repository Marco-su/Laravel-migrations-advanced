<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    // 1:n CON TABLA USERS (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1:n CON TABLA CATEGORIA (inversa)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // 1:1 POLIMORFICA CON TABLA IMAGES
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // 1:n POLIMORFICA CON TABLA COMMENTS
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
