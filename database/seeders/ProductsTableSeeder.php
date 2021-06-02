<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for($i = 1;$i<10;$i++)
        {
            DB::table('products')->insert([
                'name'=>'Iphone' .$i,
                'slug'=>'I-phone-' .$i,
                'origin_price'=>'25000000',
                'price_sales'=>'18000000',
                'user_id'=> 1,
                'category_id'=> 1,
                'updated_at' => carbon::now(),
            ]);
        }
        
    }
}
