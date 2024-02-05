<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\SubScriptionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
        UserSeeder::class,
        CategorySeeder::class,
        CountrySeeder::class,
        StateSeeder::class,
        CitySeeder::class,
        SubCategorySeeder::class,
        SubScriptionSeeder::class,
    ]);
    }
}
