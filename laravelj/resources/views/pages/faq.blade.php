@extends('layouts.front')
@section('title', 'Frequently Asked Questions | ' . $setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">FAQs</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Frequently Asked Questions</span></h2>
    <div class="row px-xl-5">
        <div class="col-12 bg-light">
            <div id="accordion">
                @foreach ($datalist as $rs)
                <h3>{{$rs->question}}</h3>
                <div>
                    <p>{!! $rs->answer !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    
@endsection
@section('js')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( "#accordion" ).accordion();
    </script>
@endsection