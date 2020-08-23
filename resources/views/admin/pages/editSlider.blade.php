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
        Edit Slider Form
        <small>Edit Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Edit Slider</li>
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
            <form method="post" action="{{url('/updateSlider')}}/{{$result->id}}" enctype="multipart/form-data">
              @csrf

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="">Heading</label>
                <input type="text" name="heading" value="{{$result->heading}}" class="form-control" placeholder="Slider Heading">
              </div>
              <br>
   
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <label for="">Subheading</label>
                <input type="text" name="subheading"value="{{$result->subheading}}" class="form-control" placeholder="Subheading">
              </div>

            <br>
                

            <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <label for="">Status</label>
                <select class="form-control"  id="status_id" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
                </select>
            </div>
                <br>
            <div>
            <img style="height:200px; width:200px" src="{{asset($result->img)}}" alt="Preview">
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


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
@stop
@section('script')@stop

@section('extraJquery')
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
$("#status_id").val({{$result->status}});
</script>

@endsection