@extends('layouts.front_end_index')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist Page</h2>
                    <div class="breadcrumb__option">
                        <a href="{{'/'}}">Home</a>
                        <span>Wishlist Page</span>
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
                                <th>Add to Cart</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlist as $row)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('images/products/'.$row->product->image_one)}}" alt="" width="100px" height="100px">
                                    <h5>{{ $row->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$row->product->price}}
                                </td>
                                <td class="shoping__cart__price">
                                    <form action="{{ url('add/to-cart/'.$row->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" value="{{ $row->product->price}}">
                                    </form>
                                    <a class="btn btn-sm btn-danger" href="">Add to cart</a>
                                    <!-- {{$row->product->price}} -->
                                </td>
                                <!-- <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="{{ route('cart.quantity.update',$row->id)}}" method="POST">
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{ $row->qty}}" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                    </div>
                                </td> -->
                                <td class="shoping__cart__total">
                                    {{ $row->price * $row->qty }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ route('wishlist.destroy', $row->id)}}"> <span class="icon_close"></a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection