<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'logo' => $this->faker->image(),
            'web' => $this->faker->url(),
            'projectDescription' => $this->faker->text(),
            'state' => $this->faker->randomElement(["Pendiente","Completado","En"]),
            'initDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
        ];
    }
}
