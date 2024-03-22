<?php

namespace Database\Factories;

use App\Models\Environment;
use App\Models\LinkGroup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LinkGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'order' => fake()->randomNumber(),
            'environment_id' => Environment::all()->random()->id,
        ];
    }
}
