<?php

namespace Database\Factories;

use App\Models\Link;
use App\Models\LinkGroup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order' => fake()->randomNumber(),
            'url' => fake()->url(),
            'label' => fake()->word(),
            'tooltip_text' => fake()->sentence(3),
            'html_id' => fake()->word(),
            'link_group_id' => LinkGroup::all()->random()->id,
        ];
    }
}
