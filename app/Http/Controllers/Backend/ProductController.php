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
use App\Models\Order;
use App\Models\Notification;
use App\Models\Statistical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Str;
use Carbon\Carbon;


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

        $data = $request->except('_token');

        if ($request->has('key') || $request->has('val')) {
            $key = $request->get('key');
            $val = $request->get('val');
            $list = [];
            $merge = [];
            for ($i = 0; $i < count($key); $i++) {
                $list = [$key[$i] => $val[$i]];
                $merge = array_merge($merge, $list);
            }
            $data['content_more'] = json_encode($merge, JSON_UNESCAPED_UNICODE);
        }

        $data['slug'] = Str::slug($request->get('name'));
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();

        $product->name = $request->get('name');
        // $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->price_sales = $request->get('price_sales');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        // $product->user_id = Auth::user()->id;

        $product = Product::create($data);

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

                $path = Storage::disk('public')    //->L??u v??o trong th?? m???c public
                ->putFileAs('images', $file, $name); 
                
                $image = new Image();

                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
            
        }else{
            dd('Khong co anh');
        }

        $notification = new Notification();

        $notification->user_id = Auth::user()->id;
        $notification->content = "???? t???o m???i m???t s???n ph???m";
        $notification->save();

        if($save)
        {
            // $request->session()->flash('success' , 'T???o m???i s???n ph???m th??nh c??ng');
            alert()->success('Th??nh C??ng','T???o m???i s???n ph???m th??nh c??ng');
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
        $order = Order::where('status',4)->get();
        return view('backend.dashbroad',[
            'product' => $product,
            'products' => $products,
            'user' => $user,
            'order' => $order,
        ]);
    }

    public function searchCategory(Request $request)
    {
        $product = Product::where('category_id',$request->category_id)->get();
        $products = Product::all();
        $user = User::all();
        $order = Order::where('status',4)->get();
        return view('backend.dashbroad',[
            'product' => $product,
            'products' => $products,
            'user' => $user,
            'order' => $order,
        ]);
    }

    public function searchStatus(Request $request)
    {
        $product = Product::where('status',$request->status)->get();
        $products = Product::all();
        $user = User::all();
         $order = Order::where('status',4)->get();
        return view('backend.dashbroad',[
            'product' => $product,
            'products' => $products,
            'user' => $user,
            'order' => $order,
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

        $data = $request->except('_token');

        if ($request->has('key')) {
            $key = $request->get('key');
            $val = $request->get('val');
            $list = [];
            $merge = [];
            for ($i = 0; $i < count($key); $i++) {
                $list = [$key[$i] => $val[$i]];
                $merge = array_merge($merge, $list);
            }
            $data['content_more'] = json_encode($merge, JSON_UNESCAPED_UNICODE);
        } else {
            $data['content_more'] = null;
        }


        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->price_sales = $request->get('price_sales');
        $product->content = $request->get('content');
        $product->status = $request->get('status');

        $product->update($data);


        $save = $product->save();

        if ($request->hasFile('image')){
            $files = $request->file('image'); 
            foreach($files as $file)
            {
                $name = $file->getClientOriginalName();

                $disk_name = 'public';

                $path = Storage::disk('public')    //->L??u v??o trong th?? m???c public
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
        }
        // dd($product);
         if($save)
        {
            alert()->success('Th??nh c??ng','C???p nh???t s???n ph???m th??nh c??ng');
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

        Alert()->success('Th??nh c??ng' ,'X??a s???n ph???m th??nh c??ng');
        
        return redirect()->route('product.list');
    }

    public function manage()
    {
        $order = Order::orderBy('created_at','desc')->get();

        return view('backend.product.manage',[
            'order' => $order,
        ]);
    }

    public function formhanding($id)
    {
        $order = Order::find($id);
        return view('backend.product.handing',[
            'order' => $order,
        ]);
    }

    public function handing(Request $request,$id)
    {
        $order = Order::find($id);

        $order->status = $request->get('status');
        
        $order->save();

        if ($order->status == 4) {

                $now  = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                if ($statistical = Statistical::where('order_date', $now)->first()){
                    $statistical->sale += $order->total;
                    $statistical->updated_at = Carbon::now();
                    $statistical->save();
    
                } else {
                    $statistical = new Statistical();
                    $statistical->order_date = $now;
                    $statistical->sale = $order->total;
                    $statistical->created_at = Carbon::now();
                    $statistical->updated_at = Carbon::now();
                    $statistical->save();
                }
            }

        if($order)
        {
            alert()->success('X??? l?? ????n h??ng th??nh c??ng');
        }

        return redirect()->route('product.manage');
    }

    public function searchProduct(Request $request)
    {
        $order = Order::where('status',$request->status)
                        ->orderBy('created_at','desc')
                        ->get();
        return view('backend.product.manage',[
            'order' => $order,
        ]);
    }

    public function cancelProduct($id)
    {
        $order = Order::find($id);

        $order->status = 5;
        $save = $order->save();
        if($save)
        {
            alert()->success("???? g???i y??u c???u h???y ????n");
        }
        return redirect()->route('follow');
    }

    public function check($id)
    {
        $order = Order::find($id);

        $check = $order->delete();
        if($check)
        {
            alert()->success('X??? l?? y??u c???u th??nh c??ng');
            return redirect()->route('product.manage');
        }
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        $order->status = 3;

        $cancel = $order->save();

        if($cancel)
        {
            alert()->success('X??? l?? y??u c???u th??nh c??ng');
            return redirect()->route('product.manage');
        }

        
    }
}
