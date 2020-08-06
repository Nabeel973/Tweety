<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProfileController;

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
        return [
            'name'=> 'string|required|max:255',
            'username'=> 'string|required|max:255|alpha_dash',
            'avatar'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
            'email'=> 'email|required|string',
            'password'=>'required|min:10|string|confirmed',
            'background'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
            'description'=>'string|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'username.required' => 'A username is required',
            'email.required' => 'An email is required',
            'password.required' => 'A password is required',
            'description' => 'A description should be string',

        ];
    }
}
