<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $path = $this->path();

        if (strpos($path, 'account')){
            $rules = [
                'name' => 'nullable|string|max:30|unique:users',
                'email'=> 'nullable|string|email|max:100|unique:users'
            ];
        }elseif (strpos($path, 'password')){
            $rules = [
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ];
        }

        return $rules;
    }
}
