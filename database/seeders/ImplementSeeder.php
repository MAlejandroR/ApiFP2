<?php

namespace Database\Seeders;

use App\Models\Implement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Implement::factory(5)->create();
        //
    }
}
