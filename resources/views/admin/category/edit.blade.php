@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="amit">Dashboard</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Category</div>
                <div class="card-body">
                    <form action="{{ route('category.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $amit['id']}}">
                          <label for="exampleInputEmail1" class="form-label">Category</label>
                          <input type="text" value="{{ $amit['category_name'] }}" class="form-control" id="category_name" name="category_name" value="" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                          <input type="text" value="{{ $amit['status'] }}" class="form-control" id="status" name="status" value="" placeholder="Enter Status">

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
      </div>


  </div><!-- sl-mainpanel -->
@endsection
