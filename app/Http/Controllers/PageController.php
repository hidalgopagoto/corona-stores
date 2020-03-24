<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $banners = Banner::where('active', 1)->whereNotNull('image_url')->orderBy('order')->orderBy('id')->get();
        $categories = Category::orderBy('order')->orderBy('id')->limit(3)->get();
        $products = Product::where('featured', 1)->inRandomOrder()->limit(8)->get();
        $data = ['banners' => $banners, 'categories' => $categories, 'products' => $products];
        return view('home')->with($data);
    }

    public function quemsomos(Request $request)
    {
        $data = [];
        return view('quem-somos')->with($data);
    }

    public function termos(Request $request)
    {
        $data = [];
        return view('quem-somos')->with($data);
    }

    public function contato(Request $request)
    {
        $data = [];
        return view('contato')->with($data);
    }
}
