<?php

namespace Database\Factories;

use App\Models\Descriptor;
use App\Models\Environment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescriptorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Descriptor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->words(2, true),
            'active' => fake()->boolean(),
            'environment_id' => Environment::all()->random()->id,
        ];
    }
}
