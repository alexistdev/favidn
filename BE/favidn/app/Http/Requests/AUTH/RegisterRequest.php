<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

namespace App\Http\Requests\AUTH;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules['name'] = 'required|max:255';
        $rules['email'] = 'required|email|max:255';
        $rules['password'] = 'required|min:8|max:16';
        return $rules;
    }

    public function messages()
    {
        $message = [
            'name.required' => "Nama harus diisi!",
            'name.max' => "Panjang karakter maksimal 255 karakter!",
            'email.required' => "Email harus diisi!",
            'email.max' => "Panjang karakter maksimal 255 karakter!",
            'email.email' => "Email tidak valid!",
            'password.required' => "Password harus diisi!",
            'password.min' => "Panjang karakter minimal 8 karakter!",
            'password.max' => "Panjang karakter maksimal 16 karakter!"
        ];
        return $message;
    }
}
