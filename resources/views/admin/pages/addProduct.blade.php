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
        Add Product Form
        <small>Add Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add Product</li>
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
            <form method="post" action="{{url('/insertProduct')}}" enctype="multipart/form-data">
              @csrf

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <label for="">Product Name</label>
                <input type="text" required name="product_name" class="form-control" placeholder="Product Name">
              </div>
              <br>
              <div class="input-group">

<span class="input-group-addon"><i class="fa fa-globe"></i></span>
<label for="">Product Category</label>
  <select class="form-control"  id="category_name" name="product_type">
  @foreach ($results as $result)
    <option value="{{ $result->id }}">{{ $result->prductCategoryName }}</option>
@endforeach
  </select>
</div>

<br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
               <label for="">Prics</label>
                <input type="number" required name="price" class="form-control" placeholder="Price">
              </div>
              <br>
                
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                <label for="">Description</label><br>
                <textarea name="description" required placeholder="Description"  id=""  cols="40" rows="5"></textarea>
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

<br>
<div class="form-group">
                    <label for="exampleInputFile">Image input</label> 
                    <div class="input-group">
                      <div class="custom-file">
                    <input required type='file' name="img" id="imgInp_slider" />
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

@endsection