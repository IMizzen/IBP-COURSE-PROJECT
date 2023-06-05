@extends('layouts.adminbase')
@section('title','Add Product')
@section('css')
@endsection
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.category.index')}}">Product</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Product Elements</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Parent Product</label>
                  <select name="category_id" class="form-control select2">
                    <option value="0" selected="selected">Main Category</option>
                    @foreach($data as $rs)
                      <option value="{{ $rs->id }}"> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" name="price" value="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantity</label>
                  <input type="number" class="form-control" name="quantity" value="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Minimum Quantity</label>
                  <input type="number" class="form-control" name="minquantity" value="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tax %</label>
                  <input type="text" class="form-control" name="tax" value="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Detail Inf.</label>
                  <textarea name="detail" id="detail" class="form-control textarea">

                  </textarea>
                  
              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" class="custom-file-input" name="image">
                  <p class="help-block">Choose image file.</p>
                </div>
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="status">
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(function (){
      //Sumernote
      $('.textarea').summernote()
    })
  </script>
      
@endsection