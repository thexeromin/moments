<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['caption', 'like', 'image_url', 'author_id'];

    public function likes()
    {
        return $this->belongsToMany(
            User::class,
            'post_user_likes',
            'post_id',
            'user_id'
        )->withTimestamps();
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
