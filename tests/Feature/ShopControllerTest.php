<?php

namespace Tests\Feature;

use Database\Seeders\AreasTableSeeder;
use Database\Seeders\GenrusTableSeeder;
use Databese\Seeders\PersonTableSeeder;
use Database\Seeders\ShopsTableSeeder;
use Database\Seeders\StarsTableSeeder;
use database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genru;
use App\Models\Person;
use App\Models\Favorite;

class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShopController_index_get()
    {
        $this->seed();

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/thanks');
        $response->assertStatus(200);

    }
}
