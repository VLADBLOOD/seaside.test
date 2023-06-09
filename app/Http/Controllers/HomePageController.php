<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public static function index()
    {
        return view('home')->with([
            'products' => \App\Models\Product::all()
        ]);
    }
}
