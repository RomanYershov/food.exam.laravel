<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@list.ru',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'image' => 'http://food:8080/storage/images/p4vIsBYULFYqkV867garxwoILNpxZJ62gtFWeQwg.jpeg',
            'signCode' => str_random(30)
        ]);
    }
}
