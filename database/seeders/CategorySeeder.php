<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(5)->create(); // Add 5 unique categories to the database.

        Category::factory()->create([
            'name' => 'Travel',
            'content' => 'Blogs focusing on travelling.'
        ]);
        Category::factory()->create([
            'name' => 'Food',
            'content' => 'Blogs focusing on eating out and fine cuisine.'
        ]);
        Category::factory()->create([
            'name' => 'Parenting',
            'content' => 'Blogs focusing on strategies for raising children.'
        ]);
        Category::factory()->create([
            'name' => 'Creative',
            'content' => 'Blogs for showcasing artistic pursuits.'
        ]);
        Category::factory()->create([
            'name' => 'DIY',
            'content' => 'Do it Yourself Blogs.'
        ]);
    }
}