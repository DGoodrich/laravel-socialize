<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'poster_id', 'body'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function parentComments()
    {
        return $this->comments()->where('parent_id', 0);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function poster()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }
}
