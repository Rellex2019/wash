<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'login' => ['required', 'string', 'max:255', 'unique:users,login'],
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[а-яА-ЯёЁ\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^\+7\d{3}\d{3}\d{2}\d{2}$/'],
            'password' => ['required', 'string', Password::min(6)],
        ];
    }

    public function messages()
    {
        return [
            'full_name.regex' => 'ФИО должно содержать только кириллические символы и пробелы.',
            'phone.regex' => 'Телефон должен быть в формате +7(XXX)-XXX-XX-XX.',
        ];
    }
}
