<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    User::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password123')
    ]);
}
}
