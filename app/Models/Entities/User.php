<?php

namespace App\Models\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'dob', 'gender', 'profile_photo_path', 'profile_photo_extension', 'bio', 'is_banned',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets the users profile photo
     *
     * @return string
     */
    public function ProfilePhotoBase64()
    {
        $file = Storage::get($this->profile_photo_path);

        return 'data:image/' . $this->profile_photo_extension . ';base64,' . base64_encode($file);
    }

    /**
     * Gets a list of all users following the user.
     */
    public function followers()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'user_id', 'follow_id')->withPivot('accepted')->withTimestamps();
    }

    /**
     * Gets a list of all users that the user is following.
     */
    public function following()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'follow_id', 'user_id')->withPivot('accepted')->withTimestamps();
    }

    /**
     * Get all of the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
