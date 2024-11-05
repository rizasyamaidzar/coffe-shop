<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use Illuminate\Http\Request;

class UserOrder extends Controller
{
    //
    public function displayOrder()
    {
        $booking = Order::orderBy('id', 'desc')->get();
        return view('public.pages.user.order', [
            'bookings' => $booking
        ]);
    }
}
