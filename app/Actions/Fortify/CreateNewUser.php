<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Freelancer;
use App\Models\Employer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'role' => ['required', 'string'], 
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'], // For Freelancers
            'company_name' => ['nullable', 'string', 'max:255'], // For Employers
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
            'address' => $input['address'] ?? null,
            'phone_number' => $input['phone_number'] ?? '', // Default to empty string
            'bio' => '', // Default to empty string

        ]);

        // Associate the Freelancer or Employer model based on the role
        if ($input['role'] === 'freelancer') {
            Freelancer::create([
                'user_id' => $user->id,
                'job_title' => $input['job_title'] ?? null,
                'skills' => '', // Default to empty string
                'hourly_rate' => 0, // Default to 0
                'tags' => '', // Default to empty string
            ]);
        } elseif ($input['role'] === 'employer') {
            Employer::create([
                'user_id' => $user->id,
                'company_name' => $input['company_name'] ?? null,
                'company_size' => $input['company_size'] ?? '1-10', // Default to 1-10 employees
            ]);
        }

        return $user;
    }
}
