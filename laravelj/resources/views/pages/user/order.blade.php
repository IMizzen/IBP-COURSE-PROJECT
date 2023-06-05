@extends('layouts.front')
@section('title', 'Order ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">Order</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Shipping Information</span></h2>
    @include('home.messages')
    <form name="sentMessage" action="{{route('shopcart.storeorder')}}" method="post">
        @csrf
    
        <div class="row px-xl-5 bg-light">
            <div class="col-md-6 mb-5">
                <div class="contact-form bg-light p-30">
                    <h4 class="title">Shipping Information</h4>
                    <div id="success"></div>
                    <div class="control-group">
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="phone" placeholder="Your Phone"
                            required="required" data-validation-required-message="Please enter your phone" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="address" placeholder="Address"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="bg-light p-30 mb-30">
                    <h4 class="title">Payment Information [ ${{$total}} ]</h4>
                    <div class="control-group">
                        <input type="hidden" class="form-control" name="total" value="{{$total}}"
                            required="required"/>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="holder" placeholder="Card Holder"
                            required="required" data-validation-required-message="Please enter your card holder" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="number" class="form-control" name="number" placeholder="Card Number"
                            required="required" data-validation-required-message="Please enter your card number" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="date" placeholder="Exp. Date"
                            required="required" data-validation-required-message="Please enter your card exp. date" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="code" placeholder="Security Code"
                            required="required" data-validation-required-message="Please enter your card security code" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit"> Send Payment </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Contact End -->
    
@endsection
@section('js')
    
@endsection