<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AreasTableSeeder::class,
            GenrusTableSeeder::class,
            PersonTableSeeder::class,
            ShopsTableSeeder::class,
            StarsTableSeeder::class,
            AdminSeeder::class,
        ]);
    }
}

