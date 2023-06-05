@extends('layouts.front')
@section('title', 'User Order List ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">User Order List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">My Orders</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-2 mb-5 ">
            <div class="bg-dark p-30 mb-30">
                @include('pages.user.usermenu')
            </div>
        </div>

        <div class="col-lg-10 mb-5">
            <div class="bg-light p-30 mb-30">
                <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Name & Surname</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th style="width: 40px">Cancel</th>
                    </tr>
                    @foreach ($data as $rs)
                    <tr>
                      <td>{{$rs->id}}</td>
                      <td>{{$rs->name}}</td>
                      <td>{{$rs->phone}}</td>
                      <td>{{$rs->email}}</td>
                      <td>{{$rs->address}}</td>
                      <td>{{$rs->status}}</td>
                      <td>
                        <a href="{{route('userpanel.orderdetail',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">
                          Show Detail
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
    
@endsection
@section('js')
    
@endsection