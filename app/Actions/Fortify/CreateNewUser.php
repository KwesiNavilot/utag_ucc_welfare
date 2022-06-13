<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Traits\Essentials;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use Essentials;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
//        dd($input);
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:30', 'min:2', 'alpha'],
            'lastname' => ['required', 'string', 'max:50', 'min:2', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'confirmed', Password::min(8)->letters()->numbers()],
        ])->validate();


        return User::create([
            'member_id' => $this->generateMemberOrRelativeId(),
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
