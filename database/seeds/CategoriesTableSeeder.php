<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')
            ->insert([
                [ 
                    'name' => 'iOS',
                    'description' => 
                    'Todo lo relacionado a los dispositivos iOS',
                ],
                [ 
                    'name' => 'Android',
                    'description' => 
                    'Todo lo relacionado a los dispositivos Android',
                ],
                [ 
                    'name' => 'Videojuegos',
                    'description' => 
                    'Todo lo relacionado a los videojuegos',
                ],
                [ 
                    'name' => 'PC',
                    'description' => 
                    'Todo lo relacionado a las Computadoras',
                ],
            ]);
    }
}
