<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class ProductFeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $four_product = Product::orderBy('id','desc')
                                ->take(4)
                                ->get();
        $all_product = Product::orderBy('id','desc')->paginate(8);
        return view('frontend.home',[
            'products' => $four_product,
            'all_pr' => $all_product,
        ]);
    }

    public function home()
    {
        
        if(!Cache::has('cate'))
        {
            $cate = Category::get();
            $cache = Cache::put('cate', $cate, 60);
        }
            dd('Co cache');
    }

    public function cout()
    {   
            $cate = Cache::get('cate');

            dd($cate);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product_category = Product::where('category_id' , $product->category->id)
                                    ->orderBy('id','desc')
                                    ->get();
        $product_random = Product::all()->random(4);

        // dd('Stop');
        return view('frontend.detail',[
            'product' => $product,
            'product_category' => $product_category,
            'product_random' => $product_random,
        ]);
    }

    public function list($id)
    {
        $product = Product::where('category_id', $id)->get();
        $catego = Category::find($id);
        return view('frontend.list',[
            'product' => $product,
            'zolo' => $catego,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
