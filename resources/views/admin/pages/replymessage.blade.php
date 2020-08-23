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
        Reply Message 
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active"> Reply Message Form</li>
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
            <form action="{{url('/insertReply')}}" method="POST" > 
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Customer Name</label>
                        <input type="text" required name="toname" value="{{$result->fname}}" id="inputName" class="form-control">
                          </div>
                      <div class="form-group">
                        <label for="inputName">Customer Email</label>
                      <input type="email" required name="toemail" value="{{$result->email}}" id="inputName" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Reply Message</label>
                        <div class="mb-3">
                        <textarea rows="4" cols="50" name="replymessage" required placeholder="Describe  here..." ></textarea>
                      </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
             
              </div>
              <div class="row mb-5">
                <div class="col-md-9">
                  <a href="/dashboard" class="btn btn-secondary">Cancel</a>
                  <button class="btn btn-success float-right" type="submit" > Submit </button>
                </div>
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


</script>

@endsection