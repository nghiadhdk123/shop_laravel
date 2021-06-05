<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Nghia',
            'email' => 'trandinhnghia@gmail.com',
            'password' => bcrypt('nghiadh1'),
            'address' => 'Bac Ninh',
            'role' => 0,
        ]);

        DB::table('user_infor')->truncate();
        DB::table('user_infor')->insert([
            'address' => 'Bac Ninh',
            'phone' => '0904373670',
            'user_id' => 1,
        ]);
    }
}
