@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="amit">Dashboard</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
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
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $amit)
                                <td>{{$amit->id}}</td>
                                <td>{{$amit->category_name}}</td>
                               <td>@if ($amit->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                    @endif

                            </td>
                                <td>
                                    <a href="{{ route('category.edit', $amit->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('category.delete',$amit->id)}}" class="btn btn-danger">Delete</a>

                                    @if ($amit->status == 1)
                                        <a class="btn btn-info" href="{{ route('category.inactive',$amit->id)}}">Active</a>
                                    @else
                                        <a class="btn btn-primary" href="{{ route('category.active',$amit->id)}}">Inactive</a>
                                    @endif
                                </td>

                        </tbody>
                        @endforeach
                    </table>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div>
                <div class="card-body">
                    <form action="{{ route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>

                            <input type="text" class="form-control" id="category_name" name="category_name" value="" placeholder="Enter Category">

                        </div>
                        <div class="form-group">
                            <label for="category_name">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Enter Status"  name="status">

                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
      </div>


  </div><!-- sl-mainpanel -->
@endsection
