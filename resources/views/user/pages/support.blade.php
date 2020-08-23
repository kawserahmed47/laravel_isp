@extends('user.master')
@section('title'){{$title}}@stop
@section('content')


<section class="miniBanner">
    <div class="container">
    <div class="w3pvt_banner_info text-left">
				<div class="w3layouts_banner_margin">					
					<h2 class="editContent  mb-5  text-center"> Support Team </h2>				
				</div>
			</div>
    </div>
</section>
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>

<section class="pb-5 py-4 team-agile position-relative" id="team">
	<div class="container py-lg-5">
		<center><h3 class="heading">Our Team</h3></center>
		<div class="d-flex team-agile-row pt-sm-5 pt-3">
		@foreach($supports as $support)
			<div class="col-lg-3 col-sm-6 w3pvt-team">
				<div class="box20">
					<img src="{{ $support->img }}" alt="" class="img-fluid" />
					<div class="box-content">
						<h3 class="title">{{ $support->name }}</h3>
						<span class="post">{{ $support->designation }}</span><br>
						<span class="post fa fa-phone">{{ $support->mobile }}</span>
					</div>
					<ul class="icon">
						<li>
							<a href="tel:{{ $support->mobile }}">
								<span class="fa fa-phone"></span>
							</a>
						</li>
						<!-- 
						<li>
							<a href="#">
								<span class="fa fa-link"></span>
							</a>
						</li>
						 -->
					</ul>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	<div class="position-right-img">
		<img src="images/balloon.png" class="img-fluid" alt="" />
	</div>
</section>

@endsection