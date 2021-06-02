<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {   
        // $users = DB::table('products')->get();

        // dd($users);
        $products = Product::paginate(3);
        return view('backend.dashbroad',[
            'product'=>$products
        ]);
    }
}
