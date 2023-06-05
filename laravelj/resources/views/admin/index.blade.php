@extends('layouts.adminbase')
@section('title','Admin Panel')
@section('css')
    
@endsection

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li class="active">Home page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="bg-light p-30 mb-30">
          @include('profile.show')
        </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

@endsection

@section('js')
      
@endsection