<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Entity;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'entityName' => $this->faker->regexify('[A-Za-z0-9]{70}'),
            'entityCode' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'web' => $this->faker->url(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
