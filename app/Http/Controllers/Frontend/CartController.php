<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Notification;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index(Request $request)
    {       
            $items = Cart::content();
            
            return view('frontend.cart',[
                'items' => $items,
            ]);
            
    }

    public function add($id)
    {
        $product = Product::find($id);

        // dd($product->price_sales);

        Cart::add($product->id,$product->name,1,$product->price_sales,0,[
                    'image' => $product->images[0]->image_url,
        ]);

        return redirect()->route('list.cart');
    }

    public function remove($id)
    {
        Cart::remove($id);

        return redirect()->route('list.cart');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('list.cart');
    }

    public function pay(StoreCartRequest $request)
    {
        $user = Auth::user();
        if(!$user)
        {
            alert()->error("Đăng nhập tài khoản để thanh toán");
            return redirect()->route('login.form');
        }else{
            $order = new Order();

            $order->name = $request->get('name');
            $order->phone = $request->get('phone');
            $order->address = $request->get('address');
            $order->qty = $request->get('qty');
            $order->product_id = $request->get('product_id');
            $order->content = $request->get('content');
            $order->total = $request->get('total');
            $order->user_id = Auth::user()->id;
            $items = Cart::content();
            $order->save();

            $notification = new Notification();

            $notification->user_id = Auth::user()->id;
            $notification->content = "đã đặt hàng mới một sản phẩm mau vào xử lí nhanh !!";
            $notification->save();

            alert()->success('Đặt hàng thành công','Cảm ơn bạn đã ủng hộ shop');
            return redirect()->route('frontend.index');
        }
    }
}
