@extends('user.master')
@section('title'){{$title}}@stop
@section('content')


<section class="miniBanner">
    <div class="container">
    <div class="w3pvt_banner_info ">	
				<div class="w3layouts_banner_margin">					
                <h2 class="editContent mb-5 text-center"> Contact </h2>
				</div>
			</div>
    </div>
</section>

<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>

<!-- contact -->
<div class="contact-wthree py-5" id="contact">
        <div class="container py-md-3">
            <div class="text-center pb-4">
                <h3 class="heading mb-4">contact us</h3>
            </div>
            <div class="row ">
				<div class="col-lg-3 col-md-4">
					<div class="address wthree-location">
						<h4><span class="fa fa-map-marker"></span> Address</h4>
						<p>65, Green Road (3rd Floor),Dhaka-1205</p>
						<p></p><br>
						<p></p>
						<p></p>
					</div>
					<div class="address my-4 wthree-phone">
						<h4><span class="fa fa-phone"></span> Phone</h4>
						<p><a href="tel:+8801621111777">+8801621111777</a></p>
						<p><a href="tel:+8801621111666">+8801621111666</a></p>
					</div>
					<div class="address my-4 wthree-email">
						<h4><span class="fa fa-envelope-open"></span> Email Address</h4>
						<p><a href="mailto:bayazidhasan@gmail.com" class="d-block">bayazidhasan@gmail.com</a></p>
						<p><a href="info@a1networkbd.com" class="d-block">info@a1networkbd.com</a></p>
					</div>
				</div>
                <div class="col-lg-9 col-md-8">
                @if(Session::get('message'))
              <p class="text-success text-center">{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif
                    <!-- register form grid -->
                    <div class="register-top1">
                        <form action="{{url('/insertContactMessage')}}" method="post" class="register-wthree">
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            First name
                                        </label>
                                        <input required class="form-control" type="text" placeholder="Johnson" name="fname"
                                            required="">
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-4">
                                        <label>
                                            Last name
                                        </label>
                                        <input required class="form-control" type="text" placeholder="Kc" name="lname" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Mobile
                                        </label>
                                        <input required class="form-control" type="text" placeholder="xxxx xxxxx" name="mobile"
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
                                        <textarea required name="message" placeholder="Type your message here" class="form-control"></textarea>
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
    </div>
    <!-- //contact -->

 <section id="sponsers">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9417792278714!2d90.38440171498135!3d23.749455484589745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bb252fa6b3%3A0x56689e586447d6fc!2sA1+Online!5e0!3m2!1sen!2sbd!4v1546940357941" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

</section>

@endsection