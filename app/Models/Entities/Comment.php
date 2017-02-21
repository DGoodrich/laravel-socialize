<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'parent_id', 'body'
    ];

    public function replies()
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function allRepliesWithOwner()
    {
        return $this->replies()->with(__FUNCTION__, 'owner');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
