<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Entities\Post;
use App\Models\Services\UserService;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param UserService $username
     * @return bool
     */
    public function authorize(UserService $username)
    {
        $user = $username->get($this->route('user'));

        switch ($this->method())
        {
            case 'POST': {
                return $this->user()->can('create', [new Post(), $user]);
            }
            case 'PATCH': {
                return $this->user()->can('update', $user);
            }
            case 'DELETE': {
                return $this->user()->can('destroy', $user);
            }
            default:
                return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post' => 'required|max:255|min:3',
        ];
    }
}
