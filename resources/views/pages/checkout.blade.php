@extends('layouts.front_end_index')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{ route('place-order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="shhiping_first_name" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="shhiping_last_name">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Street Address">
                        </div>
                        <div class="checkout__input">
                            <p>State<span>*</span></p>
                            <input type="text" name="state" placeholder="Enter your state name">
                        </div>
                        <div class="checkout__input">
                            <p>Post Code / Zip<span>*</span></p>
                            <input type="text" name="post_code" placeholder="Enter your Zip">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="shipping_phone" value="{{ Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="shipping_email" value="{{ Auth::user()->email}}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach($carts as $cart)
                                <li>{{ $cart->product->product_name }} ({{ $cart->qty}})<span>${{ $cart->price * $cart->qty}}</span></li>
                                @endforeach
                            </ul>
                            @if(Session::has('coupon'))
                            <div class="checkout__order__total">Total <span>{{ $subtotal - session()->get('coupon')['discount_amount']}}</span></div>
                            @else
                            <div class="checkout__order__subtotal">sub total <span>${{ $subtotal}}</span></div>

                            @endif

                            <h5>Select Payment Method</h5>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Handcash
                                    <input type="checkbox" id="payment" value="handcash" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection