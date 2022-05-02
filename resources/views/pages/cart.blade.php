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

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session('cart_delete'))
                <div class="alert alert-success" role="alert">
                    {{session('cart_delete')}}
                </div>
                @endif
                @if(session('coupon_remove'))
                <div class="alert alert-success" role="alert">
                    {{session('coupon_remove')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                @if(session('cart_update'))
                <div class="alert alert-success" role="alert">
                    {{session('cart_update')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('coupon_applied'))
                <div class="alert alert-success" role="alert">
                    {{session('coupon_applied')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('images/products/'.$cart->product->image_one)}}" alt="" width="100px" height="100px">
                                    <h5>{{ $cart->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cart->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="{{ route('cart.quantity.update',$cart->id)}}" method="POST">
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{ $cart->qty}}" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ $cart->price * $cart->qty }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ route('cart.destroy', $cart->id)}}"> <span class="icon_close"></a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{'/'}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                @if(session()->get('coupon')['coupon_nmae'])
                @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{ route('cart.coupon.apply')}}" method="POST">
                            @csrf
                            <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="btn btn-primary">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @if(Session::has('coupon'))
                        <li>Subtotal <span>{{ $subtotal}}</span></li>
                        <li>coupon <span>{{ session()->get('coupon')['coupon_nmae']}}
                            <a href="{{ route('coupon_remove')}}">X</a>
                        </span></li>
                        <li>Discount <span>{{ session()->get('coupon')['coupon_discount']}} %( {{ 
                       session()->get('coupon')['discount_amount'] }} tk)</span></li>
                        
                            <li>Total <span>$ {{ $subtotal - session()->get('coupon')['discount_amount']}}</span> </li>
                        @else   
                        <li>Total <span>{{ $subtotal }}</span></li>
                        @endif
                    </ul>
                    <a href="{{ route('checkout.index')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection