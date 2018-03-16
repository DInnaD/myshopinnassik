<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class MainController extends IndexController
{
    public function index()
    {
        $val = parent::index();
        $brand = Brand::take(3)->orderBy('id', 'desc')->get();
        $hits = Product::take(8)->where('status', '=', '1')->where('hit', '=', '1')->get();
        return view('pages.index', ['brand' => $brand, 'hits' => $hits , 'val' => $val]);
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('product'));
    }
}
