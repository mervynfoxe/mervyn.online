<?php

namespace Database\Seeders;

use App\Models\Descriptor;
use Illuminate\Database\Seeder;

class DescriptorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Descriptor::factory()
            ->count(10)
            ->create();
    }
}
