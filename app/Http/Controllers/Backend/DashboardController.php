<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use App\Models\Userinfor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   

        

        // $users = DB::table('products')->get();
        
        // $products = Product::find(1);
        // $category = $products->category;

        // die();

        // dd($category->name);

        // $category = Category::find(2);

        // $products = $category->products;

        // foreach($products as $val)
        // {
        //     echo $val->name;
        // }

        // dd(Auth::user()->name);
        $products = Product::all()->sortByDesc("id");
        $user = User::all();
        $product = Product::all();
        return view('backend.dashbroad',[
            'product'=>$products,
            'products'=>$product,
            'user'=>$user,
        ]);
    }

    public function show(Request $request)
    {

        //Cách 1:
        // $request->session()->put('login',"Tran Dinh Nghia");

        // Cách 2:

        // session(['user_id' => '15' , 'user_name' => 'Tran Dinh Nghia']);

        // dd($request->session()->get('user_id') , $request->session()->get('user_name'));

        // $cart = [
        //     '1' => [
        //         'id' => 1,
        //         'name' => 'MacBook Air',
        //         'price' => 60000000,
        //     ],
        // ];

        // session(['cart' => $cart]);
        // dd($request->session()->get('cart'));





        dd(Cookie::get('Hello'));

        Cookie::queue('Hello', 'Tran Dinh NGhia' , 10);

       

        













        if ($request->session()->has('cart')) {

            $cart = session('cart');

            $product = [
                    'id' => 2,
                    'name' => 'MacBook Air Pro',
                    'price' => 80000000,
            ];
            
            $cart[2] = $product;
            session(['cart' => $cart[2]]);
            $request->session()->get('cart');
            dd($cart);

        }

        // $order = new Order();
        
        // $order->total = '2000000';
        // $order->save();

        // $attach = $order->order()->attach([2,3]);

        // dd($attach);
    }
}
