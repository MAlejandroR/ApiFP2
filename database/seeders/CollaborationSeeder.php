<?php

namespace Database\Seeders;

use App\Models\Collaboration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collaboration::factory(5)->create();
        //
    }
}
