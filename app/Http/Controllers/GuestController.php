<?php

namespace App\Http\Controllers;

use App\Models\Product\Cart;
use App\Models\Product\Order;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

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
        $dessert = Product::where('type', 'foods')->orderBy('id', 'desc')->take(8)->get();
        $drinks = Product::where('type', 'drinks')->orderBy('id', 'desc')->take(8)->get();

        dd($drinks);
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
        return Redirect::route('product.pay');
    }
    public function productPay(Request $request)
    {
        return view('public.pages.pay');
    }
    public function success()
    {
        $delete = Cart::where('user_id', Auth::user()->id)->get();
        $delete->each(function ($item) {
            $item->delete();
            Session::forget('price');
        });
        return view('public.pages.success');
    }

    public function bookingTables(Request $request)
    {
        $requestDate = Carbon::createFromFormat('n/j/Y', $request->date);
        $currentDate = Carbon::now();

        if ($requestDate->greaterThan($currentDate)) {
            $validateData = $request->validate([
                "first_name" => "required",
                "last_name" => "required",
                "date" => "required",
                "time" => "required",
                "phone" => "required",
                "message" => "nullable",
                "user_id" => "required",
            ]);
            Booking::create($request->all());
            return Redirect::route('home')->with(['booking' => 'your booked a table is successfully']);
        } else {
            return Redirect::route('home')->with(['date' => 'invalid date, choose a date future']);
        }
    }
}
