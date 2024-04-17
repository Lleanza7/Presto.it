<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ], [
            'name.required' => __('ui.name.required'),
            'name.max' => __('ui.name.max'),
            'email.required' => __('ui.email.required'),
            'email.email' => __('ui.email.email'),
            'email.max' => __('ui.email.max'),
            'email.unique' => __('ui.email.unique'),
            'password.required' => __('ui.password.required'),
            'password.alfa' => __('ui.password.alfa'),
            'password.mod' => __('ui.password.mod'),
            'password.confirmed' => __('ui.password.confirmed'),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
