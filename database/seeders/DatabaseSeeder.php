<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collaboration;
use Illuminate\Database\Seeder;

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
            CollaborationSeeder::class,
            EntitySeeder::class,
            FamilySeeder::class,
            FavouriteSeeder::class,
            ImplementSeeder::class,
            ProjectSeeder::class,
            TechnologySeeder::class,
            UserSeeder::class
        ]);
    }
}
