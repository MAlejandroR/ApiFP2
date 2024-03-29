<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Technology;

class TechnologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Technology::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tag' => $this->faker->name(),
            'techName' => $this->faker->name(),
        ];
    }
}
