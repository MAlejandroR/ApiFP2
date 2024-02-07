<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Family;

class FamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Family::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'familyCode' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'familyName' => $this->faker->name(),
        ];
    }
}
