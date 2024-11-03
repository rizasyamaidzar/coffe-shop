@extends('public.layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartProducts->count() > 0)
                                    @foreach ($cartProducts as $product)
                                        <tr class="text-center">
                                            <td class="product-remove"><a href='/cart/{{ $product->id }}'><span
                                                        class="icon-close"></span></a>
                                            </td>

                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image:url({{ asset('assets/images/' . $product->image) }});">
                                                </div>
                                            </td>

                                            <td class="product-name">
                                                <h3>{{ $product->name }}</h3>
                                                <p></p>
                                            </td>

                                            <td class="price">${{ $product->price }}</td>

                                            <td>
                                                <div class="input-group mb-3">
                                                    <input disabled type="text" name="quantity"
                                                        class="quantity form-control input-number" value="1"
                                                        min="1" max="100">
                                                </div>
                                            </td>

                                            <td class="total">${{ $product->price }}</td>
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
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{ $totalPrice }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{ $totalPrice }}</span>
                        </p>
                    </div>
                    @if ($cartProducts->count() > 0)
                        <form action="{{ route('prepared.checkout') }}" method="action">
                            <input type="hidden" name="price" value="{{ $totalPrice }}">
                            <button type="submit" class="text-center" class="btn btn-primary py-3 px-4">Proceed to
                                Checkout</button>
                        </form>
                    @else
                        <p class="text-center alert alert-success">you cannot checkout because you have no product in cart
                        </p>
                    @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Related products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
