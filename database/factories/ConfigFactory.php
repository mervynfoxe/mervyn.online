<?php

namespace Database\Factories;

use App\Models\Config;
use App\Models\Environment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Config::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'config_name' => fake()->lexify('config_????????'),
            'value' => strtolower(str_replace(' ', '_', fake()->words(3, true))),
            'environment_id' => Environment::all()->random()->id,
        ];
    }
}
