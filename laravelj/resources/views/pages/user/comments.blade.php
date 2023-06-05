@extends('layouts.front')
@section('title', 'My Reviews ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">User Comments & Reviews</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">User Comments & Reviews</span></h2>
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
                      <th>Product Name</th>
                      <th>Subject</th>
                      <th>Review</th>
                      <th>Rate</th>
                      <th>Status</th>
                      <th style="width: 40px">Delete</th>
                    </tr>
                    @foreach ($comments as $rs)
                    <tr>
                      <td>{{$rs->id}}</td>
                      <td><a href="{{route('product',['id'=>$rs->product->id])}}"> {{$rs->product->title}}</a></td>
                      <td>{{$rs->subject}}</td>
                      <td>{{$rs->review}}</td>
                      <td>{{$rs->rate}}</td>
                      <td>{{$rs->status}}</td>
                      <td>
                        <a href="{{route('userpanel.reviewdestroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" 
                          onclick="return confirm('Deleting !! Are you sure?')">
                          Delete
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