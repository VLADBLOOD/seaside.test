<?php

namespace App\Http\Controllers;

use App\Enums\ClothSizeEnum;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public static function administration()
    {
        return view('admin.product')->with([
            'categories' => Category::all(),
            'sizes' => ClothSizeEnum::cases()
        ]);
    }

    public static function index()
    {
        return view('shop')->with([
            'products' => Product::all()
        ]);
    }

    public static function show($productID)
    {
        return view('product-single')->with([
            'product' => Product::find($productID),
            'sizes' => ClothSizeEnum::cases()
        ]);
    }

    public static function createProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cover' => 'required|image',
            'images.*' => 'required|image',
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'category' => 'required|integer',
            'size' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->with('alert', $validator->errors()->first());
        }

        $product = Product::createFromRequest($request);

        return back()->with('alert', 'Success: ' . 'New product created');
    }
}
