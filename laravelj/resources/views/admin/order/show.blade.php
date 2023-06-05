@extends('layouts.adminwindow')
@section('title', 'Show Order :'.$data->title)
@section('css')
    
@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
      <h2>Order Detail</h2>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Order</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 200px">ID</th>
              <td>{{$data->id}}</td>
            </tr>
            <tr>
              <th>User Name</th>
              <td>{{$data->user->name}}</td>
            </tr>
            <tr>
              <th>Name</th>
              <td>{{$data->name}}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{$data->phone}}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{$data->email}}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{$data->address}}</td>
            </tr>
            <tr>
              <th>IP Number</th>
              <td>{{$data->IP}}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{$data->status}}</td>
            </tr>
            <tr>
              <th>Created Data</th>
              <td>{{$data->created_at}}</td>
            </tr>
            <tr>
              <th>Update Data</th>
              <td>{{$data->updated_at}}</td>
            </tr>
            <tr>
              <th>Admin Note :
                <br><br><br>
                Status:
              </th>
              <td>
                <form role="form" method="post" action="{{route('admin.order.update',['id'=>$data->id])}}">
                  @csrf
                  <textarea name="note" cols="60" >{{$data->note}}</textarea><br>
                  <select name="status">
                    <option>{{$data->status}}</option>
                    <option>Accepted</option>
                    <option>Shipped</option>
                    <option>Cancelled</option>
                    <option>Completed</option>
                  </select>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Amount</th>
              <th>Image</th>
              <th>Status</th>
              <th style="width: 40px">Accept</th>
              <th style="width: 40px">Cancel</th>
            </tr>
            @foreach ($datalist as $rs)
            <tr>
              <td>{{$rs->id}}</td>
              <td>{{$rs->product->title}}</td>
              <td>{{$rs->price}}</td>
              <td>{{$rs->quantity}}</td>
              <td>{{$rs->amount}}</td>
              <td>
                @if($rs->product->image)
                  <img src="{{Storage::url($rs->product->image)}}" style="height: 40px;">
                @endif
              </td>
              <td>{{$rs->status}}</td>
              <td>
                <a href="{{route('admin.order.acceptproduct',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm" 
                  onclick="return confirm('Accepting !! Are you sure?')">
                  Accept
                </a>
              </td>
              <td>
                <a href="{{route('admin.order.cancelproduct',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" 
                  onclick="return confirm('Cancelling !! Are you sure?')">
                  Cancel
                </a>
              </td>
            </tr>
            @endforeach
          </tbody></table>
        </div><!-- /.box-body -->
      </div>

    </section><!-- /.content -->

@endsection

@section('js')
      
@endsection