@extends('layouts.adminwindow')
@section('title', 'User Detail :'.$data->title)
@section('css')
    
@endsection

@section('content')


    <!-- Main content -->
    <section class="content">
      <h2>Detail User Data</h2>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User</h3>
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
              <th>Email</th>
              <td>{{$data->email}}</td>
            </tr>
            <tr>
              <th>Roles</th>
              <td>
                @foreach ($data->roles as $role)
                    {{$role->name}}
                    <a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}"  
                      onclick="return confirm('Deleting !! Are you sure?')">[x]</a>
                @endforeach
              </td>
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
              <th>Add Role to User :</th>
              <td>
                <form role="form" method="post" action="{{route('admin.user.addrole',['id'=>$data->id])}}">
                  @csrf
                  <select name="role_id">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                   </select>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Role</button>
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