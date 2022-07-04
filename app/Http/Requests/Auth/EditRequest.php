<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'login' => 'required|string',
            'email' => 'required|string|email',
        ];
    }

    public function messages()
    {
        return [
          'login.required' => 'Логин обязателен',
          'email.required' => 'Email обязателен',
          'email.email' => 'Email не соответствует формату',
        ];
    }
}
