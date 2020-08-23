@extends('admin.master')
@section('title'){{$title}}@stop
@section('content')
  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
 @include('admin.layout.topnav')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.layout.sidenav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Media Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Media Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
        @if(Session::get('message'))
              <p class="text-success">{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif

          <!-- Input addon -->
          <div class="box box-info">

            <div class="box-body">
            <form method="post" action="{{url('/insertMedia')}}">
              @csrf
             <h4>Media</h4>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <label for=""> Media Category </label>
                  <select class="form-control"  id="category_name" name="category_name">
                  @foreach($results as $result)
                    <option value="{{ $result->id }}">{{ $result->mediaCategoryName}}</option>
               @endforeach
                  </select>
              </div>

              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-server"></i></span>
               <label for="">Server Name</label>
                <input type="text" required name="name" class="form-control" placeholder="Name">
              </div>
              <br>
                
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                <label for="">Link</label>
                <input type="text" required name="link" class="form-control" placeholder="Link">
              </div>
              <br>
              
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
              <label for="">Status</label>
              <select class="form-control"  id="category_name" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
             </select>
              </div>
                
              </div>
              <br>
              <div class="input-group">
                <button type="Submit" class="btn btn-block btn-info">Save</button>
                
              </div>
              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
 
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
-->
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
@stop
@section('script')@stop
