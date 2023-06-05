@extends('layouts.adminbase')
@section('title','Comment & Review List')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Form Comment List
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Comment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Comment List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Product Name</th>
              <th>Subject</th>
              <th>Review</th>
              <th>Rate</th>
              <th>Status</th>
              <th style="width: 40px">Show</th>
              <th style="width: 40px">Delete</th>
            </tr>
            @foreach ($data as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{$rs->user->name}}</td>
              <td><a href="{{route('admin.product.show',['id'=>$rs->product->id])}}"> {{$rs->product->title}}</a></td>
              <td>{{$rs->subject}}</td>
              <td>{{$rs->review}}</td>
              <td>{{$rs->rate}}</td>
              <td>{{$rs->status}}</td>
              <td>
                <a href="{{route('admin.comment.show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm"
                  onclick="return !window.open(this.href, '', 'top=50 left=100 witdh=1100, height=700')">
                  Show
                </a>
              </td>
              <td>
                <a href="{{route('admin.comment.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" 
                  onclick="return confirm('Deleting !! Are you sure?')">
                  Delete
                </a>
              </td>
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