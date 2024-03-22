<?php

namespace Database\Factories;

use App\Models\Icon;
use App\Models\Link;
use App\Models\LinkGroup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IconFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Icon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $iconable_type = fake()->randomElement([
            LinkGroup::class,
            Link::class,
        ]);

        return [
            'type' => fake()->word(),
            'path' => fake()->image('public/uploads/images', 64, 64),
            'alt_text' => fake()->sentence(3),
            'iconable_type' => $iconable_type,
            'iconable_id' => $iconable_type::all()->random()->id,
        ];
    }
}
