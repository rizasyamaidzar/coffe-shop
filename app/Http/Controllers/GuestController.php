<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        return view('public.pages.index');
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
    public function productSingle()
    {
        return view('public.pages.product-single');
    }
}
