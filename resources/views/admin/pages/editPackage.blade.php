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
        Package Edit
        <small>Package Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">form</a></li>
        <li class="active"> Package Edit</li>
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
            <form method="post" action="{{url('/updatePackage')}}/{{$results->id}}">
              @csrf
            

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="">Package Name </label>
                <input type="text" name="pname" class="form-control" value="{{ $results->pname }}">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $results->price }}">
              </div>
              <br>
                
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                <label for="">Bandwith</label>
                <input type="text" name="bandwith" class="form-control" value="{{ $results->bandwith }}" >
              </div>
              <br>
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                <label for=""> Youtube Bandwith </label>
                <input type="text" name="ytbandwith" class="form-control"value="{{ $results->ytbandwith }}">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                <label for=""> FTP </label>
                <input type="text" name="ftp" class="form-control" value="{{ $results->ftp }}">
              </div>
              <br>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
              <label for="">Status</label>
              <select class="form-control"  id="selectStatus" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
             </select>
              </div>

             

              
              <br>
              <div class="input-group">
                <button type="Submit" class="btn btn-block btn-info">Update</button>
                
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
@section('extraJquery')
<script>
$("#selectStatus").val({{ $results->status }});

</script>

@endsection