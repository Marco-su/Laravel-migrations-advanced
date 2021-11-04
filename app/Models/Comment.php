<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    // Declaración polimorfica
    public function commentable()
    {
        return $this->morphTo();
    }

    // 1:n INVERSA CON TABLA USERS
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
