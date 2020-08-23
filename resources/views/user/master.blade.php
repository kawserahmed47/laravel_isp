
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/ico" href="{{asset('public/images/favicon.jpg')}}">
<title>@yield('title')</title>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <!-- <link rel="stylesheet" href="{{asset('public/css/front/bootstrap.min.css')}}"> -->
 
	<meta name="keywords" content="Greetings Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	
	<script type="application/x-javascript">
		// addEventListener("load", function () {
		// 	setTimeout(hideURLbar, 0);
		// }, false);

		// function hideURLbar() {
		// 	window.scrollTo(0, 1);
		// }
	</script> 
    
	<!--// Meta tag Keywords -->
    
	<!-- css files -->
	<link rel="stylesheet" href="{{asset('public/css/front/bootstrap.css')}}"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="{{asset('public/css/front/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="{{asset('public/css/front/font-awesome.min.css')}}"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/css/front/owl.carousel.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('public/css/front/owl.theme.default.css')}}" />
	<!--web font-->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!--//web font-->
		@yield('extra_style')
    @yield('style')
</head>

<body>
	
@yield('modal1')

@include('user.layout.header')
		
<!-- banner -->
<div class=>
@yield('content')
</div>
<!-- //our sponsors -->
@include('user.layout.footer')
<!-- //subscribe -->
	<script type="text/javascript" src="{{asset('public/js/front/jquery-3.3.1.slim.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/front/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/front/owl.carousel.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/front/bootstrap.min.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('public/js/front/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/front/bootstrapCopy.min.js')}}"></script> -->

	<script>
		/*Pricing owl slider start*/
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	items:3,
	autoplay:true,
	autoplayTimeout:5000,
//	dots:true,
	responsive : {

    0 : {
        items:1
    },
    480 : {
        items:1
    },
    768 : {
        items:2
    },
		992 : {
	    items:3,
		dots:3
	}
}
});




</script>
@yield('script')
<script>
/*Scroll to Top Start*/
 mybutton = document.getElementById("topbtn");
 window.onscroll = function() {scrollFunction();myFunction()};

 function scrollFunction() {
   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
     mybutton.style.display = "block";
   } else {
     mybutton.style.display = "none";
   }
 }

 function topFunction() {
   document.body.scrollTop = 0; 
   document.documentElement.scrollTop = 0; 
 }
	/*Scroll to Top End*/

// window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}


</script>
</body>
</html>