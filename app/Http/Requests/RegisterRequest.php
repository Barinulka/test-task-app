<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class RegisterRequest extends BaseAbstractRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'partnership_id' => 'nullable|integer|exists:partnership,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.unique' => 'Такой email уже используется.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен быть не менее 4 символов.',
            'partnership_id.integer' => 'ID компании должно быть целым числом.',
            'partnership_id.exists' => 'Такой компании не существует.',
        ];
    }
}
