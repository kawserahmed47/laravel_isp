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
        Profile 
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">  Profile Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
 

          <!-- Input addon -->
          <div class="box box-info">
              @if(Session::get('message'))
              <p>{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif


            <div class="box-body">
         
            <form method="post" action="{{url('/profileUpdate')}}/{{ $results->id }}" enctype="multipart/form-data" >
              @csrf
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="mediaCategoryName">  Name </label>
                <input type="text"  name="name" value="{{ $results->name }}" class="form-control" placeholder="Name">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="mediaCategoryName"> Mobile </label>
                <input type="number"  name="phone" value="{{ $results->phone }}" class="form-control" placeholder="Mobile">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="mediaCategoryName"> Email </label>
                <input type="email"  name="email" value="{{ $results->email }}" class="form-control" placeholder="Email">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="mediaCategoryName">New Password?</label>
                <input type="password"  name="password"  class="form-control" placeholder="enter new password">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="mediaCategoryName">Confirm Password?</label>
                <input type="password" name="confirm_password"  class="form-control" placeholder="enter new password">
              </div>
              <br>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-globe"></i></span>
              <label for=""> Status </label>
              <select class="form-control"  id="status" name="status">
              @if($results->status ==1 )
                <option value="1">Active</option>
                @else
                <option value="0">Inactive</option>
                @endif
             </select>
              </div>            
              <br>
              <div>
                <img style="height:200px; width:200px" src="{{asset($results->img)}}" alt="Preview">
                </div>
    
                <br>
            <div class="form-group">
                    <label for="exampleInputFile">Image input</label> 
                <div class="input-group">
                    <div class="custom-file">
                        <input type='file' name="img" id="imgInp_slider" />
                        <img style="width: 100px; height: 100px;" id="blah_slider" src="#" alt="Preview" />
                    </div>
                </div>
            </div>




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
@section('script')
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah_slider').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp_slider").change(function(){
    readURL(this);
});

</script>


@stop
