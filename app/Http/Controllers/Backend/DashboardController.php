<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use App\Models\Userinfor;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {   
        $users = DB::table('products')->get();
        
        $products = Product::find(1);
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
        
        $products = Product::all();
        return view('backend.dashbroad',[
            'product'=>$products,
        ]);

        // $user = Userinfor::find(1);
        // $userInfo = $user->user;

        // dd($userInfo->userInfor->phone);
    }

    public function show()
    {
        $order = new Order();
        
        $order->total = '2000000';
        $order->save();

        $attach = $order->order()->attach([2,3]);

        dd($attach);
    }
}
