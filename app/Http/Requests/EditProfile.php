<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => '|max:40',
            'email' => 'email|max:100',
            'password' => 'nullable|string|min:8|confirmed',
            'current_password' => 'nullable|required_with:password|string|min:8',
            'password_confirmation' => 'nullable|string|min:8|required_with:password|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Il campo nome deve contenere solo lettere',
            'name.max' => 'Il campo nome deve essere lungo al massimo 40 caratteri',
            'email.email' => 'Il campo email deve essere un indirizzo email',
            'email.max' => 'Il campo email deve essere lungo al massimo 100 caratteri',
            'password.min' => 'La password deve contenere almeno 8 caratteri',
            'current_password.required' => 'Il campo password attuale è obbligatorio per il cambio password',
            'password_confirmation.same' => 'Le password non corrispondono',
        ];
    }
}
