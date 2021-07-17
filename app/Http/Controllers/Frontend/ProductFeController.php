<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use App\Models\Order;
use App\Models\ImagesRating;
use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\Storage;


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
        $nhan_xet = Rating::where('product_id',$id)->get();
        $nx = Rating::where('product_id',$id)->first();
        
        return view('frontend.detail',[
            'product' => $product,
            'product_category' => $product_category,
            'product_random' => $product_random,
            'nhan_xet' => $nhan_xet,
            'nx' => $nx,
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

    public function insert_rating(Request $request)
    {
        $user = Auth::user();
        if(!$user)
        {
            alert()->error("Đăng nhập tài khoản để đánh giá");
            return redirect()->route('login.form');
        }else{
            $rating = new Rating();
            $rating->content = $request->get('content');
            $rating->rating = $request->get('rating');
            $rating->product_id = $request->get('product_id');
            $rating->user_id = Auth::user()->id;
            $rating->save();

            $images = $request->file('images');
            foreach($images as $image)
            {
                // echo "Hello";
                $image->store('image');

                $name = $image->getClientOriginalName();

                $path = Storage::disk('public')    //->Lưu vào trong thư mục public
                ->putFileAs('images_rating', $image, $name); 

                $imgRating = new ImagesRating();

                $imgRating->rating_id = $rating->id;
                $imgRating->name = $name;
                $imgRating->path = $path;

                $imgRating->save();
            }
            
            // dd($rating);

            alert()->success("Cảm ơn đánh giá của bạn!!");

            $notification = new Notification();

            $notification->user_id = Auth::user()->id;
            $notification->content = "đã đánh giá một sản phẩm";
            $notification->save();
            return redirect()->route('frontend.index');
        }
    }

    public function follow()
    {
        $user = Auth::user();
        if(!$user)
        {
            alert()->error("Bạn cần phải đăng nhập tài khoản để theo dõi đơn hàng của mình");
            return redirect()->route('login.form');
        }else{
            $order = Order::where('user_id',Auth::user()->id)->get();
            return view('frontend.follow',[
            'order' => $order,
        ]);
        }
        
    }
}
