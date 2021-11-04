<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Profile;
use App\Models\Post;
use App\Models\Video;
use App\Models\Role;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1:1 CON TABLA PROFILES
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // 1:n CON TABLA POSTS
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // 1:n CON TABLA POSTS
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // 1:n CON TABLA COMMENTS
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // n:n CON TABLA ROLES
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // 1:1 POLIMORFICA CON TABLA IMAGES
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
