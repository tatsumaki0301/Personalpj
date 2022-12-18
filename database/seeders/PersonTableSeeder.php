<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create([
            'name' => 'Person001',
            'email' => 'person001@example.com',
            'password' => bcrypt('person001'),
        ]);
        Person::create([
            'name' => 'Person002',
            'email' => 'person002@example.com',
            'password' => bcrypt('person002'),
        ]);
        Person::create([
            'name' => 'Person003',
            'email' => 'person003@example.com',
            'password' => bcrypt('person003'),
        ]);
        Person::create([
            'name' => 'Person004',
            'email' => 'person004@example.com',
            'password' => bcrypt('person004'),
        ]);
        Person::create([
            'name' => 'Person005',
            'email' => 'person005@example.com',
            'password' => bcrypt('person005'),
        ]);
        Person::create([
            'name' => 'Person006',
            'email' => 'person006@example.com',
            'password' => bcrypt('person006'),
        ]);
        Person::create([
            'name' => 'Person007',
            'email' => 'person007@example.com',
            'password' => bcrypt('person007'),
        ]);
        Person::create([
            'name' => 'Person008',
            'email' => 'person008@example.com',
            'password' => bcrypt('person008'),
        ]);
        Person::create([
            'name' => 'Person009',
            'email' => 'person009@example.com',
            'password' => bcrypt('person009'),
        ]);
        Person::create([
            'name' => 'Person010',
            'email' => 'person010@example.com',
            'password' => bcrypt('person010'),
        ]);
        Person::create([
            'name' => 'Person011',
            'email' => 'person011@example.com',
            'password' => bcrypt('person011'),
        ]);
        Person::create([
            'name' => 'Person012',
            'email' => 'person012@example.com',
            'password' => bcrypt('person012'),
        ]);
        Person::create([
            'name' => 'Person013',
            'email' => 'person013@example.com',
            'password' => bcrypt('person013'),
        ]);
        Person::create([
            'name' => 'Person014',
            'email' => 'person014@example.com',
            'password' => bcrypt('person014'),
        ]);
        Person::create([
            'name' => 'Person015',
            'email' => 'person015@example.com',
            'password' => bcrypt('person015'),
        ]);
        Person::create([
            'name' => 'Person016',
            'email' => 'person016@example.com',
            'password' => bcrypt('person016'),
        ]);
        Person::create([
            'name' => 'Person017',
            'email' => 'person017@example.com',
            'password' => bcrypt('person017'),
        ]);
        Person::create([
            'name' => 'Person018',
            'email' => 'person018@example.com',
            'password' => bcrypt('person018'),
        ]);
        Person::create([
            'name' => 'Person019',
            'email' => 'person019@example.com',
            'password' => bcrypt('person019'),
        ]);
        Person::create([
            'name' => 'Person020',
            'email' => 'person020@example.com',
            'password' => bcrypt('person020'),
        ]);

    }
}
