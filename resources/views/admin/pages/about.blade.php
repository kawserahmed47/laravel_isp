@extends('admin.master')
@section('title'){{$title}}@stop
@section('style')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/css/back/bootstrap3-wysihtml5.min.css')}}">
  <style type="text/css">  
    .btn-block {
    display: block;
    width: 10%;
    }
  </style>

@stop
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
        About Editors
        <small>Add New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">ABOUT
                <small>Add Text in About Section</small>
              </h3>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form method="post">
                @csrf
                <div><input type="hidden"  name="id"></div>
                 
                <div>
                    <textarea id="editor1" name="details" rows="10" cols="80">
                      {{old('details',$about->details)}}
                    </textarea>
                </div>
                <br>
                <div class="col-sm">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">A1 Network</a>.</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
{{-- </div> --}}
<!-- ./wrapper -->
@stop
@section('script')
<!-- CK Editor -->
<script src="{{asset('public/js/back/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/js/back/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@stop

