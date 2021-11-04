<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Categoria extends Model
{
    use HasFactory;

    // 1:n CON TABLA POSTS
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
