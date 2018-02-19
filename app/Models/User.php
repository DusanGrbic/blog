<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function publish(Post $post) {
        return $this->posts()->save($post);
    }
}
