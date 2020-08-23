@extends('user.master')
@section('title'){{$title}}@stop

@section('modal1')
<!--modal form-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order  for  <span style="color: #337ab7;" id="forWhat">Product Name</span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
				<form action="/packageOrder" method="post">
				@csrf
				
						<input type="hidden" name="product_id"  id="product_id" /><br>		
                        <input type="hidden" name="product_name" id="product_name" /><br>
						<input type="hidden" name="product_price"  id="product_price" /><br>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="full_name" class="form-control" id="recipient-name" placeholder="Your Name" />
                    </div>
                    
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Name:</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
					</div>
              
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Mobile:</label>
						<input type="text" name="mobile" class="form-control" id="mobile" placeholder="Your Mobile"/>
					</div>
               
					<div class="form-group">
						<label for="message-text" class="col-form-label">Address:</label>
						<textarea class="form-control" name="address" id="message-text" rows="3" required></textarea>
					</div>
               
					<div class="form-group">
                      <div class="row">
					  <div class="col-sm-6">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>        
                        </div>
                        
                        </div>
					</div>
                </form>
            </div>

        </div>
    </div>
</div>
@stop

@section('content')
 <!-- <section class="miniBanner" id="home">
	<div class="banner-layer">
		<div class="container">
			<div class="w3pvt_banner_info text-center">
				<div class="w3layouts_banner_margin">
					 <h3 class="editContent">2020 </h3>
					<h2 class="editContent">Happy New Year</h2>
					<h4>Get ready to celebrate</h4>
					<a href="#events"> Upcoming Events </a> 
				</div>
			</div>
		 To bottom button 
			 <div class="thim-click-to-bottom mt-5 pt-md-5">
				<div class="rotate">
					<a href="#about" class="scroll">
						<span class="fa fa-angle-double-down"></span>
					</a>
				</div>
			</div>
			To bottom button 
		</div>
	</div>
</section> -->


<section>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
	  @foreach($sliders as $slider)
	  @if($slider->id == 1)
    <div class="carousel-item active">
	  <img class="d-block w-100" style="height:500px;" src="{{asset($slider->img)}}" alt="First slide">	
	 	 <div style="margin-bottom:140px" class="carousel-caption d-none d-md-block">
		  <h1 class="text-light">{{$slider->heading}}</h1>
		  <p class="text-light">{{$slider->subheading }}</p>
  		</div>	
	</div>
	@else
	<div class="carousel-item ">
		<img class="d-block w-100" style="height:500px;" src="{{asset($slider->img)}}" alt="First slide">	
			<div style="margin-bottom:140px" class="carousel-caption d-none d-md-block">
			<h1 class="text-light">{{$slider->heading}}</h1>
			<p class="text-light">{{$slider->subheading }}</p>
			</div>	
	  </div>
	@endif
   @endforeach
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</section>
  

<!-- fireworks animation -->
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!-- //fireworks animation -->
<!-- about -->
<section class="about py-5" id="about">
	<div class="container py-md-5">
		<div class="row about-grids">
			<div class="col-lg-6">
				<h3 class="heading mb-4">About A1 Network</h3>
			<p>
			A1 Network offers all Kinds of IT Solutions and optimal access to Internet & a range of related services. <br> <br>
			There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passag you need to be sure there isn't anything.
			</p>
				
			</div>
			<div class="col-lg-5 col-md-8 mt-lg-0 mt-4 offset-lg-1 text-center about-middle">
				<h5>New Years Eve</h5>
				<h4 class="heading mb-3">Packages on sale now</h4>
				<p class="">Buy your new year special package to get super fast internet browsing</p>
				<a href="#package">Buy Package</a>
			</div>
		</div>
	</div>
</section>
<!-- about -->

<!-- fireworks animation -->
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!-- //fireworks animation -->

<!-- events -->
<section class="events py-5 " id="events">
	<div class="container py-md-5">
		<div class="row event-grids">
			<div class="col-lg-5">
				<h3 class="heading mb-4">Why Choose Us</h3>
				<ul class="event-names mt-5">
					<li class="d-flex"><h3 class="mr-3"><span class="fa fa-globe"></span></h3> World Class Alliances </li>
					<li class="para">We don’t pursue every company that needs computer support. We choose only clients that share in our values. Serving a company’s IT and critical network needs is a HUGE responsibility that we take that very seriously.</li>

					<li class="d-flex"><h3 class="mr-3"><span class="fa fa-adjust"></span></h3> Committed to Quality</li>
					<li class="para">Duis interdum mi id purus feugiat, eu sagittis diam finibus. Duis efficitur ante eget nibh finibus, at tincidunt nibh aliquet. </li>

					<li class="d-flex"><h3 class="mr-3"><span class="fa fa-adn"></span></h3> One Stop Solution </li>
					<li class="para">Ensure Service is your one-stop solution for all your servicing needs. We are a one-of-its-kind organization that services consumers, retailers, SMBs and enterprise customers. </li>
				</ul>
			</div>
			<div class="col-lg-6 offset-lg-1 mt-lg-0 mt-4">
				
				<img src="{{asset('public/images/broadband.jpg')}}" alt="" class="img-fluid" />
				<h4>Please join us for a best services of you broadband internet connection and related products</h4>
				<a href="/contact">Join with Us</a>
			</div>
		</div>
	</div>
</section>
<!-- //events -->

<!-- fireworks animation -->
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!-- //fireworks animation -->

<!-- what we do -->
<section class="services py-5 position-relative" id="services">
	<div class="container py-md-5">
		<div class="row service-grids">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="heading">
					<h1>OUR SOLUTION</h1>
					<p class="text-center text-dark">A smart team has lots of experience</p>
				</div>
			</div>
<!--
			<div class="col-lg-4">
				<h3 class="heading">Are you ready to rock? <br>We planned Mind-blowing Entertainment for you</h3>
			</div>
-->
			<div class="col-lg-12 offset-lg-1 mt-lg-0 mt-4">
				<div class="row w3layouts-row">
					<div class="col-md-3 col-sm-6 serv-grid text-center w3pvt-grid">
					<span class=" pb-3 fa fa-cog"></span>
						<h4 style="font-size:18px" class="  ">Corporate Networking</h4>
						<p>A1 Network delivers high performance copper and optical fiber cabling ... </p>
						
					</div>
					<div class="col-md-3 col-sm-6 serv-grid1 text-center w3pvt-grid">
					<span class="pb-3 fa fa-angellist"></span>
						<h4 style="font-size:18px" class="">Tower Installation</h4>
						<p>We can install many types of towers. Since 2009 we have a successfully ...</p>
						
					</div>
					<div class="col-md-3 col-sm-6 serv-grid2 text-center w3pvt-grid">
					<span class="pb-3 fa fa-wifi"></span>
						<h4 style="font-size:18px" class="">WiFi Solution / WiFi Zone</h4>
						<p>A1 Network offers an affordable turnkey Wireless Hotspot service ...</p>
					
					</div>
					<div class="col-md-3 col-sm-6 serv-grid3 text-center w3pvt-grid">
					<span class="fa pb-3 fa-fire"></span>
						<h4 style="font-size:18px" class="">Data Center Solution</h4>
						<p>Every data center has a unique set of network priorities, from ... .</p>
						
					</div>
					<div class="col-md-3 col-sm-6 serv-grid4 text-center w3pvt-grid">
					<span class="fa pb-3 fa-desktop"></span>
						<h4 style="font-size:18px" class="">Monitoring</h4>
						<p>IP/CCTV Camera Solution / Attendance System / Door Lock Solution ...</p>
						
					</div>
					<div class="col-md-3 col-sm-6 serv-grid5 text-center w3pvt-grid">
					<span class="fa pb-3 fa-calendar"></span>
						<h4 class=""style="font-size:18px" >Time & Date Stamp Machine</h4>
						<p>Time stamp is versatile, featuring high quality, clean crisp imprints...</p>
						
					</div>
					<div class="col-md-3 col-sm-6 serv-grid4 text-center w3pvt-grid">
					<span class="fa pb-3 fa-ravelry"></span>
						<h4 class="" style="font-size:18px"> Long / Short Distance Radio Installation</h4>
						<p>The point-to-point wireless topology (also called P2P) is ...</p>
					</div>
					<div class="col-md-3 col-sm-6 serv-grid5 text-center w3pvt-grid">
					<span class="fa pb-3 fa-internet-explorer"></span>
						<h4 style="font-size:18px" class="">Corporate Internet</h4>
						<p>A1 Network Dedicated Internet Access delivers seamless access to Internet ...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--
	<div class="position-left-img">
		<img src="images/glass.png" class="img-fluid" alt="" />
	</div>
-->
</section>

<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!--  OUR SOLUTION  START   -->


<section class="services  mb-5 text-center  position-relative" id="service">

	<div class="container  py-md-3">
		<div class="row service-grids">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="heading text-light">
					<h1 style="font-weight:800;">OUR SERVICES</h1>
					<p class="text-center text-dark">Professionaly work and prosper</p>
				</div>
			</div>
		</div>
	</div>

	
<div class=" text-white " style="background: #048277 !important;" >
  <div class="container p-5 text-light">
<!-- row -->
 	<div class="row mb-3 ">
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12 text-light">
			<div >
				<h3 class="text-white float-left " ><span style="padding-right: 12px;" class="fa fa-wifi"></span> Internet </h3><br>
				<p class="text-white float-left">A1 Network Internet service provider (ISP) is anorganization </p>
			</div>
    	</div>
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
				<h3 class="text-white float-left"><span class="fa fa-home" style="padding-right: 12px;"></span> Home / Shared Internetome </h3><br>
				<p class=" text-white float-left ">A1 Network offers reliable shared internet access for home users. </p>
			</div>
    	</div>
  

	
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div >
				<h3 class="text-white float-left"><span class="fa fa-server " style="padding-right: 12px;"></span>Hosting Service</h3><br>
				<p class="text-white float-left"> Web Hosting with Unlimited Features 24x7 Support. </p>
			</div>
    	</div>
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
				<h3 class="text-white float-left"><span class="fa fa-university " style="padding-right: 12px;"></span>Educational Institute </h3><br>
				<p class="text-white float-left"> A1 Network design bandwidth for </p>
			</div>
    	</div>
  
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
				<h3 class="text-white float-left"><span class="fa fa-wordpress " style="padding-right: 12px;"></span> Web Development</h3><br>
				<p class="text-white float-left"> Web development is a broad term for the work involved in </p>
			</div>
    	</div>
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
			<h3 class="text-white float-left"><span class="fa fa-connectdevelop " style="padding-right: 12px;"></span> Dark Fiber Connectivity </h3><br>
			<p class="text-white float-left">A1 Network Dark Fiber is a fiber-optic point to point solution </p>
			</div>
    	</div>
  	
    	<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
				<h3 class="text-white float-left"><span class="fa fa-sellsy " style="padding-right: 12px;"></span> Broadband Reseller </h3><br>
			<br>	<p class="text-white float-left"> A1 Network offers reliable Internet for the Local Internet provider </p>
			</div>
    	</div>

		<div class="col-md-6 mb-3 col-sm-6 col-xs-12">
			<div>
				<h3 class="text-white float-left"><span class="fa fa-tags " style="padding-right: 12px;"></span> MPLS </h3><br>
			</div>
			<br>
			<p class="text-white" style="float:left" > MPLS (Multi Protocol Label Switching) is a standards.</p>
    	</div>

    
	</div>

 </div>
</div>		

</section>




<!--  OUR SOLUTION END -->


<!-- //what we do -->

<!-- fireworks animation -->
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>



<!-- //fireworks animation -->
<!--offer slider start-->
<section id="package"  class="text-dark mt-5 text-center">
<div class="container  py-md-3">
		<div class="row service-grids">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="heading text-light">
					<h1 style="font-weight:800;">OUR PACKAGES</h1>
					<p class="text-center text-dark">Choice your favourite Packages</p>
					@if(Session::get('message'))
              <p class="text-success">{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif
				</div>
			</div>
		</div>
	</div>

</section>


<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>

<section class="parent-box owl-carousel">


	@foreach($packages as $pack)
	<div class="box">
		<!--
		<div class="container">
		<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
		-->
		<div class="package">
				<h4>{{ $pack->pname }}</h4>
				<h1>{{ $pack->price }} BDT<span> /month</span></h1>
			<div class="package-type">
				<p>Bandwith {{ $pack->bandwith }}Mbps</p>
				<p>Youtube {{ $pack->ytbandwith }}Mbps</p>
				<p>FTP {{ $pack->ftp }}Mbps</p>
				<p>Support 24/7</p>
			</div>
				<a href="" class="button-f order" data-id="{{$pack->id }}" data-name="{{ $pack->pname}}" data-price="{{$pack->price }}" data-toggle="modal" data-target="#Modal">ORDER NOW</a>		
		</div>
	</div>
	@endforeach

</section>

<!-- <section style="background: #048277 !important;" class="services  text-center  position-relative">

<div class="">
		<div class="row service-grids">
			<div class="col-6 col-sm-6 col-md-6 col-lg-6">
				<div class="heading text-light">
					<h1 class="p-5">If Any Query , Please Feel Free to Contact Us.</h1>
					<a class="" href="/contact">Contact</a>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-6">
				<div class="heading text-light">
					<img style="width:100%" src="images/server.jpg" alt="">
				</div>
			</div>
		</div>
</div>

	
</section>		 -->


@stop

@section('script')
<script>
$(".order").click(function(){
  //  $("p").hide();
  $("#forWhat").html($(this).data('name'));
  $("#product_id").val($(this).data('id'));
  $("#product_name").val($(this).data('name'));
  $("#product_price").val($(this).data('price'));
  });

</script>
@stop



