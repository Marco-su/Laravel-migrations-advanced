<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    // n:n CON TABLA USUARIOS
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}