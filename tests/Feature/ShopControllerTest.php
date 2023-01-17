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
use Illuminate\Support\Facades\Hash;
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

        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');

        $response = $this->get('/login');

    }

    public function testShopController_post_index()
    {

        $user = new User;
        $user->name = "太郎";
        $user->email = "taro@example.com";
        $user->password = Hash::make('11111111');
        $user->save();

        $readUser = User::where('name', '太郎')->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(Hash::check('11111111', $readUser->password));

        $response = $this->actingAS($user)->get('/thanks');
        $response->assertStatus(200);
        $response->assertViewIs('thanks');

        $response = $this->actingAs($user);
        $response = $this->get('/');
        $response->assertViewIs('index');

    }

}
