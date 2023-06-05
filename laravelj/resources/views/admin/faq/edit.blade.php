@extends('layouts.adminbase')
@section('title', 'Edit FAQ :'.$data->title)
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit FAQ: {{$data->title}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('admin.product.index')}}">FAQ</a></li>
        <li class="active">Edit FAQ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">FAQ Elements</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.faq.update',['id'=>$data->id])}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Question</label>
                  <input type="text" class="form-control" name="question" value="{{$data->question}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Answer</label>
                  <textarea name="answer" class="form-control" id="answer">{{$data->answer}}</textarea>
                </div>
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="status">
                      <option selected>{{$data->status}}</option>
                      <option>True</option>
                      <option>False</option>
                    </select>
                </div>
              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update FAQ</button>
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
      $('#answer').summernote()
    })
  </script>
@endsection