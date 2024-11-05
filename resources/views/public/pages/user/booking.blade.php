@extends('public.layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">My Booking</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bookings->count() > 0)
                                @foreach ($bookings as $booking)
                                    <tr class="text-center">
                                        {{-- <td class="product-remove"><a href='/cart/{{ $booking->id }}'><span
                                                    class="icon-close"></span></a>
                                        </td> --}}

                                        <td class="product-name">
                                            <h3>{{ $booking->first_name }}</h3>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $booking->last_name }}</h3>
                                        </td>
                                        <td class="product-name">{{ $booking->date }}</td>
                                        <td class="address">{{ $booking->time }}</td>
                                        <td class="city">{{ $booking->phone }}</td>
                                        <td class="email">{{ $booking->message }}</td>
                                        <td class="status">
                                            <h6>{{ $booking->status }}</h6>
                                        </td>
                                        <td class="status">
                                            @if ($booking->status == 'Booked')
                                                <a class="btn btn-primary">Write Review</a>
                                            @else
                                                <p>not available just yet</p>
                                            @endif
                                        </td>
                                    </tr><!-- END TR-->
                                @endforeach
                            @else
                                <p class="alert alert-success">You have no product in cart just yet</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
