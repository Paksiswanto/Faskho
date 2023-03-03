<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //     public function run()
    {
         \App\Models\User::factory()->create([
            'name' => 'kuryu',
            'email' => 'unitedkuryu@gmail.com',
            'password' => bcrypt('123456789'),
            'role'=> 'admin'
         ]);
    }
}
}