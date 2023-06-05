@extends('layouts.adminbase')
@section('title', 'Show FAQ :'.$data->title)
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{route('admin.faq.edit',['id'=>$data->id])}}" class="btn btn-block btn-info" style="width:150px;">Edit</a>
          </div>
          <div class="col-sm-3">
            <a href="{{route('admin.faq.destroy',['id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure?')" class="btn btn-block btn-danger" style="width:150px;">Delete</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Detail</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 200px">ID</th>
              <td>{{$data->id}}</td>
            </tr>
            <tr>
              <th>Question</th>
              <td>{{$data->question}}</td>
            </tr>
            <tr>
              <th>Answer</th>
              <td>{!!$data->answer!!}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{$data->status}}</td>
            </tr>
            <tr>
              <th>Created Data</th>
              <td>{{$data->created_at}}</td>
            </tr>
            <tr>
              <th>Update Data</th>
              <td>{{$data->updated_at}}</td>
            </tr>
          </table>
        </div><!-- /.box-body -->
      </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

@endsection

@section('js')
      
@endsection