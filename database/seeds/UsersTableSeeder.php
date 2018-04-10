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
            'email' => 'roma.willfame@bk.ru',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'image' => 'admin.jpg'
        ]);
    }
}
