<?php

namespace Database\Seeders;

use App;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory(10)->create();
        \App\Models\Task::factory(20)->create();
        //[
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
