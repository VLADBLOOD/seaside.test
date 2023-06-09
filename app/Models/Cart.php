<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'quantity'
    ];

    public static function addProductByRequest(Request $request)
    {
        $newProductInCart = new self($request->all());
        $newProductInCart->save();

        return $newProductInCart;
    }

    public static function getProductsInCart()
    {
        return Cart::with('product')->get();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function destroy($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();

        return true;
    }
}
