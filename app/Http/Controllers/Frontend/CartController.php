<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
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
}
