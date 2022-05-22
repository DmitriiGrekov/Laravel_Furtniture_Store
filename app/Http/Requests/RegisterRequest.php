<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:100',
            'first_name'=>'required|min:2|max:100',
            'last_name'=>'required|min:2|max:100',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Поле логина обязательно к заполнению',
            'name.min' => 'Минимальная длина логина 2 символа',
            'name.max' => 'Максимальная длина логина 100 символов',
            'first_name.required' => 'Поле имени обязательно к заполнению',
            'first_name.min' => 'Минимальная длина имени 2 символа',
            'first_name.max' => 'Максимальная длина имени 100 символов',
            'last_name.required' => 'Поле фамилии обязательно к заполнению',
            'last_name.min' => 'Минимальная длина фамилии 2 символа',
            'last_name.max' => 'Максимальная длина фамилии 100 символов',
            'email.required' => 'Поле почты обязательно к заполнению',
            'password.required' => 'Пароль обязателен к заполнению',
            'password_confirmation.required' => 'Повторите пароль',
            'password.min' => 'Минимальная длина пароля 8 символов',
        ];
    }
}
