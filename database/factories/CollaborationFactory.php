<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Collaboration;
use App\Models\Family;
use App\Models\Project;
use App\Models\User;

class CollaborationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collaboration::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'projects_id' => Project::factory(),
            'users_id' => User::factory(),
            'families_id' => Family::factory(),
            'isManager' => $this->faker->boolean(),
        ];
    }
}
