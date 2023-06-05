@extends('layouts.adminwindow')
@section('title', 'Show Comment :'.$data->title)
@section('css')
    
@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
      <h2>Detail Comment Data</h2>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Comment</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 200px">ID</th>
              <td>{{$data->id}}</td>
            </tr>
            <tr>
              <th>Product Name</th>
              <td>{{$data->product->title}}</td>
            </tr>
            <tr>
              <th>Name</th>
              <td>{{$data->user->name}}</td>
            </tr>
            <tr>
              <th>Subject</th>
              <td>{{$data->subject}}</td>
            </tr>
            <tr>
              <th>Review</th>
              <td>{{$data->review}}</td>
            </tr>
            <tr>
              <th>Rate</th>
              <td>{{$data->rate}}</td>
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
              <th>Admin Note :</th>
              <td>
                <form role="form" method="post" action="{{route('admin.comment.update',['id'=>$data->id])}}">
                  @csrf
                  <select name="status">
                    <option>{{$data->status}}</option>
                    <option>True</option>
                    <option>False</option>
                  </select>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Note</button>
                  </div>
                </form>
              </td>
            </tr>
          </table>
        </div><!-- /.box-body -->
      </div>

    </section><!-- /.content -->

@endsection

@section('js')
      
@endsection