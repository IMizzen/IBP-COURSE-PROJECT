@extends('layouts.adminbase')
@section('title','Category')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{route('admin.category.create')}}" class="btn btn-block btn-info" style="width:200px;">Add Category</a>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Category List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Parent</th>
              <th>Title</th>
              <th>Image</th>
              <th>Status</th>
              <th style="width: 40px">Edit</th>
              <th style="width: 40px">Delete</th>
              <th style="width: 40px">Show</th>
            </tr>
            @foreach ($data as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title)}}</td>
              <td>{{$rs->title}}</td>
              <td>
                @if($rs->image)
                  <img src="{{Storage::url($rs->image)}}" style="height: 40px;">
                @endif
              </td>
              <td>{{$rs->status}}</td>
              <td><a href="{{route('admin.category.edit',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Edit</a></td>
              <td><a href="{{route('admin.category.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Deleting !! Are you sure?')">Delete</a></td>
              <td><a href="{{route('admin.category.show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Show</a></td>
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