@extends('layouts.front')
@section('title', 'User Order Detail ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <a class="breadcrumb-item text-dark" href="{{route('userpanel.orders')}}">Orders</a>
                <span class="breadcrumb-item active">User Order Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered bg-light">
                <tbody>
                <tr>
                  <th>Name & Surname</th>
                  <td>{{$order->name}}</td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>{{$order->phone}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{$order->email}}</td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{$order->address}}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{$order->note}}</td>
                  </tr>
                <tr>
                  <th>Status</th>
                  <td>{{$order->status}}</td>
                </tr>
              </tbody>
            </table>
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>..</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($orderproducts as $rs)
                    <tr>
                        <td class="align-middle"><img src="{{Storage::url($rs->product->image)}}" alt="" style="width: 50px;"> {{$rs->product->title}}</td>
                        <td class="align-middle">${{$rs->product->price}}</td>
                        <td class="align-middle">{{$rs->quantity}}</td>
                        <td class="align-middle">${{$rs->amount}}</td>
                        <td class="align-middle">{{$rs->status}}</td>
                        <td class="align-middle">
                            @if ($rs->status =='New')
                            <a href="{{route('userpanel.cancelproduct',['id'=>$rs->id])}}" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Cancel !! Are you sure?')"><i class="fa fa-times"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">TOTAL</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>${{$order->total}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('js')
    
@endsection