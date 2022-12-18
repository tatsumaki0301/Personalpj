<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Star;

class StarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Star::create([
            'stars' => '★'
        ]);
        Star::create([
            'stars' => '★★'
        ]);
        Star::create([
            'stars' => '★★★'
        ]);
        Star::create([
            'stars' => '★★★★'
        ]);
        Star::create([
            'stars' => '★★★★★'
        ]);
    }
}
