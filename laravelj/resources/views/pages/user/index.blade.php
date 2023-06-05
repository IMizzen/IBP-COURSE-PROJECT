@extends('layouts.front')
@section('title', 'User Panel ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">User Menu</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">User Profile</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-2 mb-5 ">
            <div class="bg-dark p-30 mb-30">
                @include('pages.user.usermenu')
            </div>
        </div>

        <div class="col-lg-10 mb-5">
            <div class="bg-light p-30 mb-30">
                @include('profile.show')
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
    
@endsection
@section('js')
    
@endsection