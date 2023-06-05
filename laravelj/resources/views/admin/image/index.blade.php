@extends('layouts.adminwindow')
@section('title','Product Image Gallery')
@section('css')
    
@endsection

@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">{{$product->title}}</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post" action="{{route('admin.image.store',['pid'=>$product->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <input type="file" class="custom-file-input" name="image">
        <p class="help-block">Choose image file.</p>
      </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Product Image List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Title</th>
              <th>Image</th>
              <th style="width: 40px">Delete</th>
            </tr>
            @foreach ($images as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{$rs->title}}</td>
              <td>
                @if($rs->image)
                  <img src="{{Storage::url($rs->image)}}" style="height: 40px;">
                @endif
              </td>
              <td><a href="{{route('admin.image.destroy',['pid'=>$product->id,'id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Deleting !! Are you sure?')">Delete</a></td>
            </tr>
            @endforeach
          </tbody></table>
        </div><!-- /.box-body -->
        
      </div>

    </section><!-- /.content -->

@endsection

@section('js')
      
@endsection