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

    protected string $icon_dir = 'storage/app/public/images/icons';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!is_dir($this->icon_dir) && !mkdir($concurrentDirectory = $this->icon_dir, 0755, TRUE) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        $iconable_type = fake()->randomElement([
            LinkGroup::class,
            Link::class,
        ]);

        return [
            'type' => fake()->word(),
            'path' => 'images/icons/' . fake()->image($this->icon_dir, 64, 64, NULL, FALSE),
            'alt_text' => fake()->sentence(3),
            'iconable_type' => $iconable_type,
            'iconable_id' => $iconable_type::all()->random()->id,
        ];
    }
}
