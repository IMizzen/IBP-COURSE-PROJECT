@extends('layouts.adminwindow')
@section('title', 'Show Message :'.$data->title)
@section('css')
    
@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
      <h2>Detail Message Data</h2>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Message</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 200px">ID</th>
              <td>{{$data->id}}</td>
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
              <th>Subject</th>
              <td>{{$data->subject}}</td>
            </tr>
            <tr>
              <th>Message</th>
              <td>{{$data->message}}</td>
            </tr>
            <tr>
              <th>IP Number</th>
              <td>{{$data->ip}}</td>
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
                <form role="form" method="post" action="{{route('admin.message.update',['id'=>$data->id])}}">
                  @csrf
                  <textarea name="note" id="note" cols="50" class="textarea">{{$data->note}}</textarea>
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