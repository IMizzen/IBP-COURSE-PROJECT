@extends('layouts.adminbase')
@section('title','Product')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{route('admin.product.create')}}" class="btn btn-block btn-info" style="width:200px;">Add Product</a>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Product List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Category</th>
              <th>Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Image</th>
              <th>Image Gallery</th>
              <th>Status</th>
              <th style="width: 40px">Edit</th>
              <th style="width: 40px">Delete</th>
              <th style="width: 40px">Show</th>
            </tr>
            @foreach ($data as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category, $rs->category->title)}}</td>
              <td>{{$rs->title}}</td>
              <td>{{$rs->price}}</td>
              <td>{{$rs->quantity}}</td>
              <td>
                @if($rs->image)
                  <img src="{{Storage::url($rs->image)}}" style="height: 40px;">
                @endif
              </td>
              <td>
                <a href="{{route('admin.image.index',['pid'=>$rs->id])}}"
                    onclick="return !window.open(this.href, '','top=50 left=100 width=1100, height=700')">
                  <img src="{{asset('/')}}assets/admin/img/galleryicon.png" style="height: 40px;" alt="User Image" />
                </a>
              </td>
              <td>{{$rs->status}}</td>
              <td><a href="{{route('admin.product.edit',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Edit</a></td>
              <td><a href="{{route('admin.product.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Deleting !! Are you sure?')">Delete</a></td>
              <td><a href="{{route('admin.product.show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Show</a></td>
            </tr>
            @endforeach
          </tbody></table>
        </div><!-- /.box-body -->
        
      </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

@endsection

@section('js')
      
@endsection