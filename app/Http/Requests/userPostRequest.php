<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userPostRequest extends FormRequest
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
            'email' => 'required|email|max:255|regex:/^[^@]+@[^@]+\.[^@]+$/|unique:users,email|',
            'username' => 'required|max:30|min:3|unique:users,name',
            'password' => [
                'required',
                'max:12',
                'min:7',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&~])(?=.*[a-z]).{7,12}$/',
                'required_with:password_confirmation',
                'same:password_confirmation'
            ],
            'password_confirmation' => 'required|max:12|min:7'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password must include at least one uppercase letter, one special character, and one digit.',
            'email.regex' => 'Invalid Email Address'
        ];
    }
}
