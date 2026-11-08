<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CreateHrAccount extends Command
{
    protected $signature = 'app:create-hr-account';

    protected $description = 'Create an HR administrator account for RecruitEase';

    public function handle()
    {
        $this->info('======================================');
        $this->info('   JOLLIBEE RECRUITEASE');
        $this->info('   HR ADMINISTRATOR ACCOUNT SETUP');
        $this->info('======================================');

        $name = $this->ask('Enter HR administrator name');

        $email = $this->ask('Enter HR administrator email');

        $password = $this->secret('Enter HR administrator password');

        $passwordConfirmation = $this->secret('Confirm password');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            $this->error('Account creation failed:');

            foreach ($validator->errors()->all() as $error) {
                $this->line('- ' . $error);
            }

            return self::FAILURE;
        }

        DB::transaction(function () use ($name, $email, $password) {
            $user = new User();

            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->role = 'hr';

            $user->save();
        });

        $this->newLine();
        $this->info('HR administrator account created successfully!');
        $this->line('Email: ' . $email);
        $this->line('Role: HR');
        $this->newLine();
        $this->comment('You can now log in to Jollibee RecruitEase.');

        return self::SUCCESS;
    }
}
