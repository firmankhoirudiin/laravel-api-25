<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\author;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder

{
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])*/
        $this->call([
            AuthorSeeder::class, #seeder authors
            BookSeeder::class, #seeder books
        ]);

        // User::factory(10)->create();
        /** 
        *User::factory()->create([
        *   'name' => 'Test User',
        *    'email' => 'test@example.com',
        *]);
        */
    }
}