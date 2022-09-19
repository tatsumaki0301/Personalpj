<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genru;

class GenruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genru::create([
            'genru_name' => '寿司'
        ]);
        Genru::create([
            'genru_name' => '焼肉'
        ]);
        Genru::create([
            'genru_name' => '居酒屋'
        ]);
        Genru::create([
            'genru_name' => 'イタリアン'
        ]);
        Genru::create([
            'genru_name' => 'ラーメン'
        ]);
    }
}
