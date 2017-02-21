<?php

namespace App\Http\Requests;

use App\Models\Services\UserService;
use App\Http\Requests\Request;

class UserRequest extends Request
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

        switch ($this->method()) {
            case 'POST': {
                return $this->user()->can('create', $this->user());
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
     * @param UserService $username
     * @return array
     */
    public function rules(UserService $username)
    {
        $user = $username->get($this->route('user'));

        switch ($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required|max:50',
                    'username' => 'required|max:20|unique:users',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|confirmed|min:8',
                    'dob' => 'required|date',
                    'gender'   => 'required|in:male,female',
                ];
            }
            case 'PATCH': {
                return [
                    'name' => 'required|max:50',
                    'username' => 'required|max:20|unique:users,username,'. $user->id,
                    'dob' => 'required|date',
                    'email' => 'required|email|unique:users,email,' . $user->id,
                    'gender'   => 'required|in:male,female',
                    'password' => 'required_with:password_confirmation|' . ($this->request->get('password') ? 'confirmed|min:8' : ''),
                ];
            }
            default:
                return [];
        }

    }
}