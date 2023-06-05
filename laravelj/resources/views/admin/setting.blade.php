@extends('layouts.adminbase')
@section('title','Settings')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" method="post" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
        @csrf
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="active"><a href="#tab_1" id="custom-tabs-one-general-tab" data-toggle="tab">General</a></li>
            <li><a href="#tab_2" id="custom-tabs-one-smtp-tab" data-toggle="tab">Smtp Email</a></li>
            <li><a href="#tab_3" id="custom-tabs-one-social-tab" data-toggle="tab">Social Media</a></li>
            <li><a href="#tab_4" id="custom-tabs-one-aboutus-tab" data-toggle="tab">About Us</a></li>
            <li><a href="#tab_5" id="custom-tabs-one-contact-tab" data-toggle="tab">Contact Page</a></li>
            <li><a href="#tab_6" id="custom-tabs-one-references-tab" data-toggle="tab">References</a></li>
            
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              
              <div class="box-body">
                <input type="hidden" id="id" name="id" value="{{$data->id}}" class="form-control">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" id="title" value="{{$data->title}}" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keywords</label>
                    <input type="text" id="keywords" class="form-control" name="keywords" value="{{$data->keywords}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" id="description" class="form-control" name="description" value="{{$data->description}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Company</label>
                  <input type="text" id="company" class="form-control" name="company" value="{{$data->company}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" id="address" class="form-control" name="address" value="{{$data->address}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" id="phone" class="form-control" name="phone" value="{{$data->phone}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fax</label>
                  <input type="text" id="fax" class="form-control" name="fax" value="{{$data->fax}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" id="email" class="form-control" name="email" value="{{$data->email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Icon</label>
                  <input type="file" id="icon" class="custom-file-input" name="icon">
                  <p class="help-block">Choose icon file.</p>
                </div>
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="status" id="status">
                      <option selected>{{$data->status}}</option>
                      <option>True</option>
                      <option>False</option>
                    </select>
                </div>
              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-1-pane -->

            <div class="tab-pane" id="tab_2">
              <div class="form-group">
                <label for="exampleInputEmail1">Smtp Server</label>
                <input type="text" id="smtpserver" class="form-control" name="smtpserver" value="{{$data->smtpserver}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Smtp Email</label>
                <input type="email" id="smtpemail" class="form-control" name="smtpemail" value="{{$data->smtpemail}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Smtp Password</label>
                <input type="password" id="smtppassword" class="form-control" name="smtppassword" value="{{$data->smtppassword}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Smtp Port</label>
                <input type="number" id="smtpport" class="form-control" name="smtpport" value="{{$data->smtpport}}">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-2-pane -->

            <div class="tab-pane" id="tab_3">
              <div class="form-group">
                <label for="exampleInputEmail1">Facebook</label>
                <input type="text" id="facebook" class="form-control" name="facebook" value="{{$data->facebook}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Instagram</label>
                <input type="text" id="instagram" class="form-control" name="instagram" value="{{$data->instagram}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" id="twitter" class="form-control" name="twitter" value="{{$data->twitter}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">You Tube</label>
                <input type="text" id="youtube" class="form-control" name="youtube" value="{{$data->youtube}}">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-3-pane -->

            <div class="tab-pane" id="tab_4">
              <div class="form-group">
                <label for="exampleInputEmail1">About Us</label>
                <textarea name="aboutus" id="aboutus" class="form-control textarea">{{$data->aboutus}}</textarea>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-4-pane -->

            <div class="tab-pane" id="tab_5">
              <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <textarea name="contact" id="contact" class="form-control textarea">{{$data->contact}}</textarea>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-5-pane -->

            <div class="tab-pane" id="tab_6">
              <div class="form-group">
                <label for="exampleInputEmail1">References</label>
                <textarea name="references" id="references" class="form-control textarea">{{$data->references}}</textarea>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </div><!-- /.tab-6-pane -->
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </form>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(function (){
      //Sumernote
      $('#aboutus').summernote()
      $('#contact').summernote()
      $('#references').summernote()
    })
  </script>
      
@endsection