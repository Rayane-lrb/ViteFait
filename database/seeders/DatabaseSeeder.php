<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Article;
use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@exemple.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
        Category::factory(5)->create();
        Faq::factory(10)->create();
        User::factory(10)->create();
        Profile::factory(10)->create();
        Article::factory(10)->create();

    }
}
