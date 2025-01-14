<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => "Administrator",
            'email' => "permadi@gmail.com",
            'email_verified_at' => now(),
            'role_id' => 3,
            'is_active' => 1,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
