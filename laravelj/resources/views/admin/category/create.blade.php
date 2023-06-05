@extends('layouts.adminbase')
@section('title','Add Category')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Category
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.category.index')}}">Category</a></li>
        <li class="active">Add Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Category Elements</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Parent Category</label>

                  <select name="parent_id" class="form-control select2">
                    <option value="0" selected="selected">Main Category</option>
                    @foreach($data as $rs)
                      <option value="{{ $rs->id }}"> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" class="custom-file-input" name="image" required>
                  <p class="help-block">Choose image file.</p>
                </div>
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="status" required>
                      <option>True</option>
                      <option>False</option>
                    </select>
                </div>
              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

@endsection

@section('js')
      
@endsection