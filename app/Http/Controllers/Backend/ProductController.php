<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::all();
        // return view('backend.product.index', [
        //     'cate' => $category
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //Kiem tra va thong bao loi cua o input
        // $validatedData = $request->validate([
        //     'name'         => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ]);

        // $validator = Validator::make($request->all(),
        //     [
        //         'name'         => 'required|min:10|max:255',
        //         'origin_price' => 'required|numeric',
        //         'price_sales'   => 'required|numeric',
        //     ],
        //     [
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max'
        //     ],
        //     [
        //         'name' => 'Tên sản phẩm',
        //         'origin_price' => 'Giá gốc',
        //         'price_sales' => 'Giá bán'
        //     ]
        // );
        // if ($validator->errors()){
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->price_sales = $request->get('price_sales');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();

        // dd($product);
        return redirect()->route('admin.index');
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
        $product = Product::find($id);
        $category = Category::all();

        // dd($product->category->name);
        return view('backend.product.update',[
            'product' => $product, 
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->price_sales = $request->get('price_sales');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->save();

        // dd($product);
        return redirect()->route('admin.index');
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
