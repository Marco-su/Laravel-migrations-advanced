<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    // 1:1 CON TABLA USERS (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
