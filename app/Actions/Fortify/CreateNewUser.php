<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'FirstName' => ['required', 'string', 'max:20'],
            'SecondName' => ['string', 'max:20'],
            'FirstLastName' => ['required', 'string', 'max:20'],
            'SecondLastName' => ['string', 'max:20'],
            'PerModProduct' => ['required','string', 'max:20'],
            'PerOrder' => ['required','string', 'max:20'],
            'PerInvoice' => ['required','string', 'max:20'],
            'PerEntry' => ['required','string', 'max:20'],
            'CodeUser' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Password' => $this->passwordRules(),
            'RolUser' => ['required','string','max:1'],
            'StatusUser' =>['required','int'],
        ])->validate();

        return User::create([
            'FirstName' => $input['FirstName'],
            'SecondName' => $input['SecondName'],
            'FirstLastName' => $input['FirstLastName'],
            'SecondLastName' => $input['SecondLastName'],
            'PerModProduct' => $input['PerModProduct'],
            'PerOrder' => $input['PerOrder'],
            'PerInvoice' => $input['PerInvoice'],
            'PerEntry' => $input['PerEntry'],
            'CodeUser' => $input['CodeUser'],
            'Password' => Hash::make($input['Password']),
            'RolUser' => $input['RolUser'],
            'StatusUser' => $input['StatusUser'],
        ]);
    }
}
