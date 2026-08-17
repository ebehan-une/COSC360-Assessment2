<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate Administrator & General Account:
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'type' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'type' => 'user',
        ]);

        // In-Order Generate Categories & Posts.
        (new CategorySeeder())->run();
        (new PostSeeder())->run();
    }
}