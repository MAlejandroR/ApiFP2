<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Implement;
use App\Models\Project;
use App\Models\Technology;

class ImplementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Implement::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'projects_id' => Project::factory(),
            'technologies_id' => Technology::factory(),
        ];
    }
}
