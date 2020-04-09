<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'name' => 'tsiory',
                'email' => 't@t.t',
                'email_verified_at' => now(),
                'password' =>Hash::make('azertyui'),
                'remember_token' => Str::random(10),
            ]
        );
        factory(User::class, 10)->create()->each(function ($user) {
            $user->save();
        });
    }
}