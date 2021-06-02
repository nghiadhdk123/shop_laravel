<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $categories = ['IOS' , 'Android'];
        foreach($categories as $key)
        {
            DB::table('categories')->insert([
                'name'=> $key,
                'slug'=> 'hello-'.$key,
                'parent_id'=>1,
                'depth'=>1,
                'updated_at'=>carbon::now(),
            ]);
        }
    }
}
