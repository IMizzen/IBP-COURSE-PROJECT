@extends('layouts.adminbase')
@section('title','Order List')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order List
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Order List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>User</th>
              <th>Name & Surname</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
              <th>Amount</th>
              <th>Admin Note</th>
              <th>Status</th>
              <th style="width: 40px">Show</th>
              <th style="width: 40px">Delete</th>
            </tr>
            @foreach ($data as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>
                <a href="{{route('admin.user.show',['id'=>$rs->user_id])}}" 
                  onclick="return !window.open(this.href, '', 'top=50 left=100 witdh=1100, height=700')">
                  {{$rs->user->name}}
                </a>
              </td>
              <td>{{$rs->name}}</td>
              <td>{{$rs->phone}}</td>
              <td>{{$rs->email}}</td>
              <td>{{$rs->address}}</td>
              <td>$ {{$rs->total}}</td>
              <td>{{$rs->note}}</td>
              <td>{{$rs->status}}</td>
              <td>
                <a href="{{route('admin.order.show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm"
                  onclick="return !window.open(this.href, '', 'top=50 left=100 witdh=1100, height=700')">
                  Show
                </a>
              </td>
              <td>
                <a href="{{route('admin.order.cancelorder',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" 
                  onclick="return confirm('Cancelling !! Are you sure?')">
                  Cancel
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