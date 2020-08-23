@extends('user.master')
@section('title'){{$title}}@stop
@section('content')


<section class="miniBanner">
    <div class="container">
    <div class="w3pvt_banner_info text-left">
				<div class="w3layouts_banner_margin">					
					<h2 class="editContent p-2 text-center">COMPLAIN HERE </h2>				
				</div>
			</div>
    </div>
</section>

<section style="height: 100px; width:100%">
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4 class="text-center mt-5" >POST YOUR: <strong>COMPLAIN </strong> </h4>
        </div>
    </div>
</div>
</section>

            @if(Session::get('message'))
              <p class="text-success text-center">{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif


<section class="mb-5 " style="">
<div class="container "> 
    <div class="row ">
    <div  class="col-lg-9 col-md-8" style="margin:0 auto;">
    
                    <!-- register form grid -->
                    <div class="register-top1">
                        <form action="{{url('/insertComplain')}}" method="post" class="register-wthree">
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            First name
                                        </label>
                                        <input class="form-control" required type="text" placeholder="Johnson" name="fname"
                                            required="">
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-4">
                                        <label>
                                            Last name
                                        </label>
                                        <input class="form-control" type="text" required placeholder="Kc" name="lname" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Mobile
                                        </label>
                                        <input class="form-control" type="text" required placeholder="xxxx xxxxx" name="mobile"
                                            required="">
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-4">
                                        <label>
                                            Email
                                        </label>
                                        <input required class="form-control" type="email" placeholder="example@email.com" name="email"
                                            required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            Your message
                                        </label>
                                        <textarea required name="description" placeholder="Type your message here" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-w3layouts btn-block">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  //register form grid ends here -->
                   
                </div>

    </div>
</div>
</section>

@endsection