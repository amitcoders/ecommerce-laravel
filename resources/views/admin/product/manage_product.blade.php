@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-lg-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Manage Product</h6>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
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
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Product Quantity</th>  
                                <th>Status</th>
                                <th>Action</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $amit)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/products/'.$amit->image_one) }}" alt="image" width="50" height="50">
                                    </td>
                                    <td>{{$amit->product_name}}</td>
                                   <td>{{ $amit->category->category_name }}</td>
                                    <td>{{$amit->product_quantity}}</td>
                                    <td>{{$amit->status}}</td>
                                    <td>
                                        <a href="{{ route('edit.products', $amit->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.products', $amit->id)}}" class="btn btn-danger">Delete</a>
                                        @if ($amit->status == 1)
                                        <a class="btn btn-info" href="{{ route('products.inactive', $amit->id)}}">Active</a>
                                    @else
                                        <a class="btn btn-primary" href="{{ route('products.active', $amit->id)}}">Inactive</a>
                                    @endif
                                </td>
                                </tr>
                                <td>
                                </td>
                        </tbody>
                        @endforeach
                    </table>
            </div><!-- form-layout -->
            </div>
        </div><!-- card -->
    </div>


</div><!-- sl-mainpanel -->
@endsection
