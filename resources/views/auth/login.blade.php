@extends('admin.master')
@section('title')@stop
@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href=""><img style="height:120px; width:100px" src="{{asset('public/images/A1logo.png')}}" alt=""></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body p-5">
    <p class="login-box-msg p-3">Sign in</p>
          @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
          @endif
    <form action="" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @if(session('errors'))
                <div>
                  <span style="color: red">{{$errors}}</span>
                </div>
              @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
@stop
@section('script')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@stop

