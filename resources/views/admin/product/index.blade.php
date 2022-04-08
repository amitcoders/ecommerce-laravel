@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Product</h6>
                <form action="{{ route('store.products')}}" method="POST">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        value="{{old('product_name')}}" placeholder="Enter product name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code"
                                        value="{{ old('product_code')}}" placeholder="Enter product code">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Price<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="price" value="{{ old('price')}}"
                                        placeholder="Enter price">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity"
                                        value="{{ old('product_quantity')}}" placeholder="Enter Product Quantity">
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id"
                                        data-placeholder="Choose country">
                                        <option label="Choose category"></option>

                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                        @endforeach

                                        {{-- <option value="USA">United States of America</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="brand_id"
                                        data-placeholder="Choose country">
                                        <option label="Choose Brand"></option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Short Descriptions</label>
                                    <input class="form-control" name="short_description" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Long Descriptions</label>
                                    <input class="form-control" name="long_description" type="text">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Main Thumbnail</label>
                                    <input class="form-control" type="file" name="image_one">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Image two</label>
                                    <input class="form-control" type="file" name="image_two">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Image three</label>
                                    <input class="form-control" type="file" name="image_three">
                                </div>
                            </div>

                        </div>

                    </div><!-- row -->

                    <!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>


</div><!-- sl-mainpanel -->
@endsection
