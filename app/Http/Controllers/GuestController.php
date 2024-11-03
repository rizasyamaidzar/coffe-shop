<?php

namespace App\Http\Controllers;

use App\Models\Product\Cart;
use App\Models\Product\Order;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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


    public function productSingle($id)
    {
        $product = Product::find($id);
        $relatedProducts = Product::where('type', $product->type)->where('id', '!=', $id)->take(4)->get();

        // checking for product in cart
        $checkingProduct = Cart::where([['pro_id', $id], ['user_id', '=', Auth::user()->id]])->count();
        return view('public.pages.product-single', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'checking' => $checkingProduct,
        ]);
    }

    // CART MEthod
    public function cart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $totalPrice = Cart::where('user_id', Auth::user()->id)->sum('price');
        // dd($totalPrice);

        return view('public.pages.cart', [
            'cartProducts' => $cart,
            'totalPrice' => $totalPrice
        ]);
    }
    public function addCart(Request $request, $id)
    {
        $pro_id = (int)$request->id;
        $price = (int)$request->price;
        $addCart = Cart::create([
            "pro_id" => $pro_id,
            "name" => $request->name,
            "price" => $price,
            "image" => $request->image,
            "user_id" => Auth::user()->id,
        ]);
        echo "item added to cart";
        return Redirect::route('productSingle', $id)->with(['success' => "product success added to cart"]);
    }
    public function deleteCart($id)
    {
        $delete = Cart::where('pro_id', $id)->where('user_id', Auth::user()->id)->first();

        $delete->delete();
        // if ($delete) {
        //     return Redirect::route('cart')->with(['success' => "product success Deleted to cart"]);
        // }
    }
    public function preparedCheckout(Request $request)
    {
        $value = $request->price;
        $price = Session::put('price', $value);
        $newPrice = Session::get($price);
        if ($newPrice > 0) {
            return Redirect::route('checkout');
        }
    }

    public function checkout()
    {

        return view('public.pages.check-out');
    }
    public function storeCheckout(Request $request)
    {
        $validateData = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "state" => "required",
            "address" => "required",
            "city" => "required",
            "post_code" => "required",
            "phone" => "required",
            "email" => "required",
            "price" => "required",
        ]);
        $validateData['user_id'] = Auth::user()->id;
        Order::create($validateData);
        return redirect('/cart')->with("success", "Checkout success");
    }
}
