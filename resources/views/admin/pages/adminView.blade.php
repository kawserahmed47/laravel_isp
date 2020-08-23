@extends('admin.master')
@section('title'){{$title}}@stop
@section('style')@stop
@section('content')
  <header class="main-header">
   
    <!-- Header Navbar: style can be found in header.less -->
     @include('admin.layout.topnav')
  </header>
  @include('admin.layout.sidenav')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Admins
        <small>Admins Tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">View</a></li>
        <li class="active"> View Admins</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        @if(Session::get('message'))
              <p class="text-success">{{ Session::get('message') }}</p>
              {{Session::put('message', NULL)}}

              @endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $a=0
              @endphp
       @foreach($results as $result)
                <tr>
                  <td>{{ $a=$a+1 }}</td>
                  <td> <img style="height:100px; width:100px" src="{{asset($result->img) }}" alt="Image"></td>
                  <td>{{ $result->name}}</td>
                  <td>{{ $result->email}}</td>
                  <td>{{ $result->phone}}</td>
                  <td>  
                    @if($result->status ==1 )
                  <a href="{{url('/adminInactiveStatus')}}/{{$result->id}}" class="btn btn-success" > Active</a>
                 @else
                 <a href="{{url('/adminActiveStatus')}}/{{$result->id}}" class="btn btn-danger" > Inactive</a>
                 
                 @endif
                 </td>
                  <td>
                  <a href="{{url('/editAdmin')}}/{{$result->id}}" class="text-primary" >Edit</a>
                 @if(!$result->level==1)
                  <a  onclick="return confirm('Are you sure?')" href="{{url('/adminDelete')}}/{{ $result->id }}" class="text-danger" >Delete</a>
                @endif
                </td>
                </tr>
             @endforeach
 
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
    <div class="control-sidebar-bg"></div>
  @stop
  @section('script')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop

{{-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html> --}}
