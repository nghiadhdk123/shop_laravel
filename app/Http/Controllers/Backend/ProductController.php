<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.product.index', [
            'cate' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
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
        // $product = Product::find($id);
        // dd($product->category->slug);

//         $category = Category::find(1);

//         $product = $category->products()->create([
//             'name' => 'san pham create',
//             'slug' => 'abcdefg',
//             'origin_price' => '10000',
//             'price_sales' => '5000',
//             'content' => 'Noi dung demo',
//             'user_id' => 1
// ]);
        $product = Product::find($id);
        $category = Category::find(2);

        $productSaved = $category->products()->save($product);
    }

    public function showImages($id)
    {
        $product = Product::find($id);

        $image = $product->images;

        // dd($image);
        echo "<h2>Image cua Product : $product->name</h2>" . "<br>";
        foreach($image as $val)
        {
            echo "Name :" .$val->name;
            echo "&nbsp&nbsp&nbsp&nbsp Source :" . $val->source ;
            echo "&nbsp&nbsp&nbsp&nbsp Path :" .$val->path;
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }

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
