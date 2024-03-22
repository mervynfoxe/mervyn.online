<?php

namespace Database\Seeders;

use App\Models\LinkGroup;
use Illuminate\Database\Seeder;

class LinkGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LinkGroup::factory()
            ->count(5)
            ->create();
    }
}
