<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

class StorUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','max:255'],
            'email'=>['required','string','max:255','unique:users'],
            'password'=>['required','confirmed',Rules\Password::defaults()],
            'address'=>['required','string','max:255'],
            'phone'=>['required','string','max:255'],
            'pincode'=>['required','string','max:255'],

        ];
    }
}
