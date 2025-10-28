<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {

            author::factory()->count(50)->create();

    }
}