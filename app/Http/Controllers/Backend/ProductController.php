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
use Illuminate\Support\Facades\Storage;

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

        // dd(storage_path());
        // Storage::disk('public')->put('filenghia.txt', 'Contents');
        //  Storage::put('nghia.txt', 'Nghia');
        // Storage::disk('local_2')->put('file2.txt', 'Contents_NGhia'); //Neu muon co local_2 thi vao filesystem thay doi local -> local_2

        $disk = Storage::disk('public');

        $path = 'filenghia.txt';

        if($disk->exists($path))
        {
            $content = $disk->get($path);
            dd($content);   
        }else{
            dd("File not exits");
        }
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


        if ($request->hasFile('image')){
            // dd('co file');
            //Cach 1:
            //1.1
            // $path = Storage::putFile('images', $request->file('image')); /* Day la cach up loadfile nhung se lay ten ramdom theo he thong */
            //1.2
            $files = $request->file('image'); 
            foreach($files as $file)
            {
                $name = time() . 'iphone' . $file->getClientOriginalExtension();

                $name = $file->getClientOriginalName();

                $disk_name = 'public';

                $path = Storage::disk('public')    //->Lưu vào trong thư mục public
                ->putFileAs('images', $file, $name); 
                
                $image = new Image();

                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
            
            //Cach 2:
            //2.1
            // $file = $request->file('image');
            // Lưu vào trong thư mục storage
            // $path = $file->store('images');
            
        }else{
            dd('khong co file');
        }

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

        if ($request->hasFile('image')){
            $files = $request->file('image'); 
            foreach($files as $file)
            {
                $name = $file->getClientOriginalName();

                $disk_name = 'public';

                $path = Storage::disk('public')    //->Lưu vào trong thư mục public
                ->putFileAs('images', $file, $name); 

                $image = Image::where('product_id',$product->id)->first();
                if(!$image){
                    $image = new Image();
                }
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }else{
             dd('khong co file');
            }
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
