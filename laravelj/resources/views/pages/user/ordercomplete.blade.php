@extends('layouts.front')
@section('title', 'Order Complete ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">Order Complete</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12 bg-light">
            @include('home.messages')
        </div>
    </div>
</div>

    
@endsection
@section('js')
    
@endsection