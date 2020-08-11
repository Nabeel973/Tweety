<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'username'=> 'string|required|max:255|alpha_dash', //if the name exixts, so ignore that one
            'avatar'=>'file,|mimes:jpeg,png,gif,jpg|max:2048',
            'email'=> 'email|required|string',
            'password'=>'required|min:10|string|confirmed',
            'avatar'=>'file,|mimes:jpeg,png,gif,jpg|max:2048',
            'background'=>'file,|mimes:jpeg,png,gif,jpg|max:2048',
        ];
    }
}
