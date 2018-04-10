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
       DB::table('categories')->insert([
           'name' => 'Десерты'
       ]);
        DB::table('categories')->insert([
            'name' => 'Напитки'
        ]);
        DB::table('categories')->insert([
            'name' => 'Салаты'
        ]);
        DB::table('categories')->insert([
            'name' => 'Супы'
        ]);
    }
}
