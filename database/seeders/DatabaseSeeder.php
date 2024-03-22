<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EnvironmentSeeder::class,
            LinkGroupSeeder::class,
            LinkSeeder::class,
            IconSeeder::class,
        ]);
    }
}
