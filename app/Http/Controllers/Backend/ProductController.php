<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Aler;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('PreventBackHistory');   
    }

    public function index()
    {
        $product = Product::paginate(5);
        return view('backend.product.list', [
            'products' => $product,
        ]);

        // dd(storage_path());
        // Storage::disk('public')->put('filenghia.txt', 'Contents');
        //  Storage::put('nghia.txt', 'Nghia');
        // Storage::disk('local_2')->put('file2.txt', 'Contents_NGhia'); //Neu muon co local_2 thi vao filesystem thay doi local -> local_2

        // $disk = Storage::disk('public');

        // $path = 'filenghia.txt';

        // if($disk->exists($path))
        // {
        //     $content = $disk->get($path);
        //     dd($content);   
        // }else{
        //     dd("File not exits");
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->can('create', Product::class))
        {
            $category = Category::all();
            return view('backend.product.create', [
                'category' => $category
            ]);
        }else{
            abort(403);
        }
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
        $save = $product->save();


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
            dd('Khong co anh');
        }

        if($save)
        {
            // $request->session()->flash('success' , 'Tạo mới sản phẩm thành công');
            alert()->success('Thành Công','Tạo mới sản phẩm thành công');
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
        $product = Product::find($id);

        return view('backend.product.detail',[
            'product' => $product,
        ]);
    }

    public function search(Request $request)
    {
        $product = Product::query()->where('name','like','%' .$request->name. '%')->get();
        $products = Product::all();
        $user = User::all();
        return view('backend.dashbroad',[
            'product' => $product,
            'products' => $products,
            'user' => $user,
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
      
        $user = Auth::user();
        $product = Product::find($id);
        $category = Category::all();

        if($user->can('update',$product))
        {
            return view('backend.product.update',[
                'product' => $product, 
                'category' => $category,
            ]);
        }else{
            abort(403);
        }
        // $product = Product::find($id);
        // $category = Category::all();

        // if(Gate::allows('update-product',$product)) //Ham kiem tra san pham co dung user_id de sua san pham khong!!
        // {
            

        //     return view('backend.product.update',[
        //         'product' => $product, 
        //         'category' => $category,
        //     ]);
        // }else{
        //     abort(403);
        // }
        // dd($product->category->name);
        
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
        $save = $product->save();

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
                dd('Khong co anh');
            }
        // dd($product);
         if($save)
        {
            alert()->success('Thành công','Cập nhật sản phẩm thành công');
        }
        
        return redirect()->route('admin.index');
   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product = Product::find($id);

        $product->delete();

        $image = Image::where('product_id',$id);
        $image->delete();

        Alert()->success('Thành công' ,'Xóa sản phẩm thành công');
        
        return redirect()->route('product.list');
    }
}
