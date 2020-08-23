
@extends('user.master')
@section('title'){{$title}}@stop

  <!-- Meta tag Keywords -->
@section('style')
  <style type="text/css">
    .banner, .banner-layer {
    min-height: 0px;
    }
  </style>
@stop



@include('user.layout.header')
@section('content')
<!-- banner -->
<section class="banner" id="home">
  <div class="banner-layer">
    <div class="container">
      <div class="w3pvt_banner_info text-center">
        <div class="w3layouts_banner_margin">

        </div>
      </div>
    </div>
  </div>
</section>





<!-- fireworks animation -->
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!-- //fireworks animation -->



  

 <!-- contact 
    <div class="contact-wthree py-5" id="contact">
      <section class="parent-box owl-carousel">
    @foreach($packages as $pack)
    <div class="box">
    -->
<!--
    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    <div class="package">
    <br>
      <h4>{{$pack->pname}}</h4>
      <h1>{{$pack->price}}<span> /month</span></h1>
      <div class="package-type">
      <p>Bandwith {{$pack->bandwith}}</p><br/>
      <p>Youtube {{$pack->ytbandwith}}</p><br/>
      <p>FTP {{$pack->ftp}}</p><br/>
      <p>Support {{$pack->support}}</p><br/>
      </div>
      <a href="" class="btn">ORDER NOW</a>
    </div>
    </div>
        @endforeach
    
    

  </section>
    </div>
    -->
   
@stop



</html>