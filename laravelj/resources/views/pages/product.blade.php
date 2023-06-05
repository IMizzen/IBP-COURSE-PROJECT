@extends('layouts.front')
@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))
@section('css')
    <style>
        .rating {
            float:left;
        }

        /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
        follow these rules. Every browser that supports :checked also supports :not(), so
        it doesn’t make the test unnecessarily selective */
        .rating:not(:checked) > input {
            position:absolute;
            top:-9999px;
            clip:rect(0,0,0,0);
        }

        .rating:not(:checked) > label {
            float:right;
            width:1em;
            padding:0 .1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:200%;
            line-height:1.2;
            color:#ddd;
            text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating:not(:checked) > label:before {
            content: '★ ';
        }

        .rating > input:checked ~ label {
            color: #f70;
            text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: gold;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating > input:checked + label:hover,
        .rating > input:checked + label:hover ~ label,
        .rating > input:checked ~ label:hover,
        .rating > input:checked ~ label:hover ~ label,
        .rating > label:hover ~ input:checked ~ label {
            color: #ea0;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating > label:active {
            position:relative;
            top:2px;
            left:2px;
        }
    </style>
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Product Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{Storage::url($data->image)}}" alt="Image">
                    </div>
                    @foreach($images as $rs)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{Storage::url($rs->image)}}" alt="Image">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            @include('home.messages')
            <div class="h-100 bg-light p-30">
                <h3>{{$data->title}}</h3>
                <div class="d-flex mb-3">
                    @php
                        $average = $data->comment->average('rate')
                    @endphp
                    <div class="text-primary mr-2">
                        <i class="@if($average<1) far @else fas @endif fa-star "></i>
                        <i class="@if($average<2) far @else fas @endif fa-star"></i>
                        <i class="@if($average<3) far @else fas @endif fa-star "></i>
                        <i class="@if($average<4) far @else fas @endif fa-star "></i>
                        <i class="@if($average<5) far @else fas @endif fa-star "></i>
                    </div>
                    <small class="pt-1">({{$data->comment->count('id')}}/{{number_format($average,1)}} Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">${{$data->price}}</h3>
                <p class="mb-4">{{$data->description}}</p>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    <form action="{{route('shopcart.store')}}" method="post">
                    @csrf
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <input type="number" class="form-control bg-secondary border-0 text-center" name="quantity" value="1" min="1">
                        <input type="hidden" class="form-control bg-secondary border-0 text-center" name="id" value="{{$data->id}}" >
                    </div><br>
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                        Cart</button>
                    </form>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews ({{$data->comment->count('id')}})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{$data->description}}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>{!!$data->detail!!}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{$data->comment->count('id')}} review for {{$data->title}}</h4>
                                @foreach($reviews as $rs)
                                <div class="media mb-4">
                                    <img src="{{asset('/')}}assets/img/profil-picture.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{$rs->user->name}}<small> - <i>{{$rs->created_at}}</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="@if($rs->rate<1) far @else fas @endif fa-star "></i>
                                            <i class="@if($rs->rate<2) far @else fas @endif fa-star"></i>
                                            <i class="@if($rs->rate<3) far @else fas @endif fa-star "></i>
                                            <i class="@if($rs->rate<4) far @else fas @endif fa-star "></i>
                                            <i class="@if($rs->rate<5) far @else fas @endif fa-star "></i>
                                        </div>
                                        <strong>{{$rs->subject}}</strong>
                                        <p>{{$rs->review}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>


                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>

                                <form role="form" action="{{route('storecomment')}}" method="post">
                                    @csrf
                                    <input type="hidden" class="input" name="product_id" value="{{$data->id}}">
                                    <div class="form-group">
                                        <label for="name" >Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Your Review</label>
                                        <textarea id="review" name="review" cols="30" required rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Your Rating</label>
                                        <div class="input-rating">
                                            <div class="rating">
                                                <input type="radio" id="star5" name="rate" value="5" /><label for="star5"></label>
                                                <input type="radio" id="star4" name="rate" value="4" /><label for="star4"></label>
                                                <input type="radio" id="star3" name="rate" value="3" /><label for="star3"></label>
                                                <input type="radio" id="star2" name="rate" value="2" /><label for="star2"></label>
                                                <input type="radio" id="star1" name="rate" value="1" /><label for="star1"></label>

                                            </div>
                                        </div>
                                    </div><br><br>
                                    @auth
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                    @else 
                                        <a href="/login" class="btn btn-primary px-3"> For Submit Your Review. Please Login</a>
                                    @endauth
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


    
@endsection
@section('js')
    
@endsection