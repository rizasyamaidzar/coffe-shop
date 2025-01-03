@extends('public.layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
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
                                <th>State</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <tr class="text-center">
                                        {{-- <td class="product-remove"><a href='/cart/{{ $order->id }}'><span
                                                    class="icon-close"></span></a>
                                        </td> --}}

                                        <td class="product-name">
                                            <h3>{{ $order->first_name }}</h3>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $order->last_name }}</h3>
                                        </td>
                                        <td class="product-name">{{ $order->state }}</td>
                                        <td class="address">{{ $order->address }}</td>
                                        <td class="city">{{ $order->city }}</td>
                                        <td class="email">{{ $order->email }}</td>
                                        <td class="price">{{ $order->price }}</td>
                                        <td class="status">
                                            <h6>{{ $order->status }}</h6>
                                        </td>
                                        <td class="status">
                                            @if ($order->status == 'Booked')
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
