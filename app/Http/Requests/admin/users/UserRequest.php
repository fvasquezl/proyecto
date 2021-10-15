<?php

namespace App\Http\Requests\admin\users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->employee)],
        ];

        if ($this->method() == 'PUT' or  $this->method() == 'PATCH') {

            if ($this->filled('password')) {
                $rules['password'] = ['confirmed', 'min:6'];
            }
        } else {
            $rules['password'] = ['required', 'confirmed', 'min:6'];
        }

        return $rules;
    }

    public function createUser()
    {
        $user = new User();

        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $user->save();
    }


    /**
     * @param $user
     */
    public function updateUser($user)
    {
        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($this->password != null) {
            $user->password = $this->password;
        }

        $user->save();
    }
}
