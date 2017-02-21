<?php

namespace App\Models\Repositories;

use App\Models\Contracts\UserInterface as UserInterface;
use App\Models\Entities\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserRepository extends BaseRepository implements UserInterface
{
    function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Search query for users.
     *
     * @param $data
     * @return mixed
     */
    public function search($data)
    {
        return $this->model->where([
            ['name', 'like', '%'. $data .'%'],
            ['is_banned', FALSE]
        ])->paginate(6);
    }

    /**
     * Returns user by username.
     *
     * @param $username
     * @return mixed
     */
    public function getByUsername($username)
    {
        return $this->model->where('username', strtolower($username))->first();
    }

    /**
     * Create a new user.
     *
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes)
    {
        return $this->model->create([
            'name' => $attributes['name'],
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'dob' => $attributes['dob'],
            'gender' => $attributes['gender'],
        ]);
    }

    /**
     * Upload user profile photo
     *
     * @param $id
     * @param UploadedFile $file
     * @param array $cropDetails
     * @return void
     */
    public function uploadProfilePhoto($id, UploadedFile $file, array $cropDetails)
    {
        Storage::delete($this->getById($id)->profile_photo_path);

        $extension = $file->getClientOriginalExtension();

        $path = '/profiles/images/pic_' . str_replace([' ', ':',
                '-'], '_', Carbon::now()) . '_' . random_int(0, 2000000) . '.' . $extension;

        Image::make($file)->crop($cropDetails['size'], $cropDetails['size'], $cropDetails['x'], $cropDetails['y'])->save(storage_path('app') .$path);

        $this->update($id, ['profile_photo_path' => $path,
            'profile_photo_extension' => $file->getClientOriginalExtension()], $id);
    }

    /**
     * Ban a list of users
     *
     * @param array $users
     * @return void
     */
    public function setBanUsers(array $users, $isBanned)
    {
        foreach ($users as $user)
        {
            $user = $this->getById($user);

            $user->update(['is_banned' => $isBanned]);
        }
    }

    /**
     * Destroy a user.
     *
     * @param User $user
     */
    public function destroyUser(User $user)
    {
        $user->comments()->delete();

        $posts = $user->posts()->get();

        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }

        $user->delete();
    }

}