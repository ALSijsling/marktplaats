<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();

        User::factory()->count(20)->create()->each(function ($user) {
            Product::factory()->count(5)
                ->create([
                    'user_id' => $user->id
                ]);
        });
    }
}
