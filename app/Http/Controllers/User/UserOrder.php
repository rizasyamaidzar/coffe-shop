<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrder extends Controller
{
    //
    public function displayOrder()
    {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('public.pages.user.order', [
            'orders' => $order
        ]);
    }
    public function displayBooking()
    {
        $booking = Booking::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('public.pages.user.booking', [
            'bookings' => $booking
        ]);
    }
}
