<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(4)->get();
        return view('public.pages.index', [
            'products' => $products
        ]);
    }
    public function menu()
    {
        return view('public.pages.menu');
    }
    public function services()
    {
        return view('public.pages.service');
    }
    public function about()
    {
        return view('public.pages.about');
    }
    public function contact()
    {
        return view('public.pages.contact');
    }
    public function cart()
    {
        return view('public.pages.cart');
    }
    public function checkout()
    {
        return view('public.pages.check-out');
    }
    public function productSingle($id)
    {
        $product = Product::find($id);
        $relatedProducts = Product::where('type', $product->type)->where('id', '!=', $id)->take(4)->get();

        return view('public.pages.product-single', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
