@extends('layouts.front')
@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)

@section('css')

@endsection
@section('slider')
    @include('home.slider')
@endsection
@section('content')

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">

            @foreach($categorylist as $rs)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{route('categoryproducts',['id'=>$rs->id,'slug'=>$rs->title])}}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{Storage::url($rs->image)}}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{$rs->title}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Products</span></h2>
        <div class="row px-xl-5">
            @foreach($productlist1 as $rs)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden" >
                            <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="{{route('product',['id'=>$rs->id])}}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{$rs->price}}</h5>
                            </div>
                            @php
                                $average = $rs->comment->average('rate')
                            @endphp
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="@if($average<1) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<2) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<3) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<4) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<5) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small>({{$rs->comment->count('id')}})</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{asset('assets')}}/laptopa.png" alt="">
                    <div class="offer-text"><br><br><br><br><br>
                        <a href="{{route('shop')}}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{asset('/')}}assets/img/slider-ek-2.jpg" alt="">
                    <div class="offer-text"><br><br><br><br><br>
                        <a href="{{route('shop')}}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5">
            @foreach($lastproducts as $rs)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden" >
                            <img class="img-fluid w-100" src="{{Storage::url($rs->image)}}" >
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="{{route('product',['id'=>$rs->id])}}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{$rs->price}}</h5>
                            </div>
                            @php
                                $average = $rs->comment->average('rate')
                            @endphp
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="@if($average<1) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<2) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<3) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<4) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small class="@if($average<5) far @else fas @endif fa-star text-primary mr-1"></small>
                                <small>({{$rs->comment->count('id')}})</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach($productlist1 as $rs)
                        <div class="bg-light p-4">
                            <a href="{{route('product',['id'=>$rs->id])}}">
                                <img src="{{Storage::url($rs->image)}}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->



@endsection
@section('js')

@endsection
