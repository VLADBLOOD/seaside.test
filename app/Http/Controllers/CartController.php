<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public static function index()
    {
        return view('cart')->with([
            'cart' => Cart::getProductsInCart()
        ]);
    }

    public static function pull(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return back()->with('alert', $validator->errors()->first());
        }

        Cart::addProductByRequest($request);

        return back()->with('alert', 'Success added to cart');
    }

    public static function count()
    {
        return Cart::count();
    }

    public static function deleteCartItem($id)
    {
        Cart::destroy($id);

        return back()->with('alert', 'Item success deleted');
    }
}
