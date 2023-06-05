@extends('layouts.front')
@section('title', 'User Shop Cart ')
@section('css')
    
@endsection
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                <span class="breadcrumb-item active">User Shop Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $total=0
                    @endphp
                    @foreach($data as $rs)
                    <tr>
                        <td class="align-middle"><img src="{{Storage::url($rs->product->image)}}" alt="" style="width: 50px;"> {{$rs->product->title}}</td>
                        <td class="align-middle">${{$rs->product->price}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <form action="{{route('shopcart.update',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input type="number" name="quantity" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$rs->quantity}}">
                                </form>
                            </div>
                        </td>
                        <td class="align-middle">${{$rs->product->price * $rs->quantity}}</td>
                        <td class="align-middle">,
                            <a href="{{route('shopcart.destroy',['id'=>$rs->id])}}" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Deleting !! Are you sure?')"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @php
                        $total += $rs->product->price * $rs->quantity
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>${{$total}}</h5>
                    </div>
                    <form action="{{route('shopcart.order')}}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{$total}}">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('js')
    
@endsection