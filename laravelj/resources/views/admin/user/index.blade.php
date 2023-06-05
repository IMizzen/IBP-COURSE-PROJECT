@extends('layouts.adminbase')
@section('title','User List')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User List
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th style="width: 40px">Show</th>
              <th style="width: 40px">Delete</th>
            </tr>
            @foreach ($data as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{$rs->name}}</td>
              <td>{{$rs->email}}</td>
              <td>
                @foreach ($rs->roles as $role)
                    {{$role->name}}
                @endforeach
              </td>
              <td></td>
              <td>
                <a href="{{route('admin.user.show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm"
                  onclick="return !window.open(this.href, '', 'top=50 left=100 witdh=1100, height=700')">
                  Show
                </a>
              </td>
              <td>
                <a href="{{route('admin.user.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" 
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