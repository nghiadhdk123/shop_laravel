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

            DB::table('images')->insert([
                'name'=>'images ' .$i,
                'product_id'=> $i,
                'path'=>'abcd '.$i,
                'source'=>'https://www.google.com/search?q=%E1%BA%A3nh+anime+anime&sxsrf=ALeKk00mK7PDstBDpAnCq-MhBgzJq5Ke7A:1622818667126&tbm=isch&source=iu&ictx=1&fir=CQ4bL-Jy284qnM%252CSuebzYl83uiHvM%252C_&vet=1&usg=AI4_-kQWmz5_bpAx7dFb9uxW2c_KtXkn3w&sa=X&ved=2ahUKEwiJg8HRnv7wAhXTF4gKHQ0WBNYQ9QF6BAgVEAE#imgrc=CQ4bL-Jy284qnM',
            ]);
        }
        
    }
}
