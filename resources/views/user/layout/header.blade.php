<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6 col-lg-6">
					<ul class="top-menu">
						<li><a href="tel:+8801621111777"><i class="fa fa-phone"></i> +8801621111777</a></li>
						<li><a href="matilto:info@a1networkbd.com"><i class="fa fa-envelope-open"></i> info@a1networkbd.com</a></li>
					</ul>
				</div>

				<div class="col-6 col-sm-6 col-md-6 col-lg-6">
					<div class="media-icon">
						<li><a href=""><i class="fa fa-facebook-f"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-youtube"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
					</div>

				</div>
			</div>
		</div>
	</section>
<header class="header" id="myHeader">	
	<div class="container">
		<!-- nav -->
		<nav class="py-md-4">
        <div id="logo">
			<h1> <a href="{{route('home')}}"><span class="" aria-hidden="true"> <img style="height:80px; width:80px" src="{{asset('public/images/A1logo.png')}}" alt=""> </span></a></h1>
		</div>

        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="drop" />
        <div id="navbar">
            <ul class="menu mt-md-3">
                <li class="mr-lg-4 mr-3 active"><a href="{{route('home')}}">Home</a></li>
{{--                 <li class="mr-lg-4 mr-3">
                First Tier Drop Down 
                <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                <a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2"/>
                <ul class="drop-down">
                    <li><a href="#about">About</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#team">Organizers</a></li>
                    <li><a href="#sponsers">Sponsers</a></li>
                    <li><a href="#subscribe">Subscribe</a></li>
                </ul>
                </li> --}}
                <li class="mr-lg-4 mr-3"><a href="{{route('home')}}#service">Services</a></li>
                <li class="mr-lg-4 mr-3"><a href="{{url('/')}}#services">Solutions</a></li>
                <li class="mr-lg-4 mr-3"><a href="{{URL::to('/')}}#package">Packages</a></li>
                <li class="mr-lg-4 mr-3">
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                <a href="#">Product <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2"/>
                <ul class="drop-down">
                             @foreach($pCategories as $pCategory )
                             <li><a href="{{url('/products')}}/{{$pCategory->id}}"> {{$pCategory->prductCategoryName}} </a></li>
                             @endforeach
                </ul>
                </li>

                <li class="mr-lg-4 mr-3">
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                <a href="#">Media <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2"/>
                <ul class="drop-down">
                             @foreach($mCategories as $mCategory )
                             <li><a href="{{url('/media')}}/{{ $mCategory->id }}"> {{$mCategory->mediaCategoryName }} </a></li>
                             @endforeach
                </ul>
                </li>
                <li class="mr-lg-4 mr-3">
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                <a href="#">Support <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2"/>
                <ul class="drop-down">
                    <li><a href="{{url('/complain')}}">Complain</a></li>
                    <li><a href="{{url('/supportteam')}}">Support Team</a></li>                    
                </ul>
                </li>
                <li class="mr-lg-4 mr-3"><a href="{{url('/contact')}}">Contact</a></li>
            </ul>
        </div>
        </nav>
         <!-- Left and right controls -->
 
		<!-- //nav -->
	</div>
   
</header>