<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Khant Nyein Zaw',
            'email' => 'helloworld@example.com',
            'is_project_manager' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('khant301120'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
