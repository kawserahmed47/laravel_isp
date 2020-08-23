@extends('user.master')
@section('extra_style')
<style>		
    .f-body {
    text-align: center;
/*    padding: 10px;*/
		box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
		width: 100%;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		margin-bottom: 20px;
		height:420px;
}
		.f-body:hover{
			box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.76);
			-webkit-transition: all 1s ease;
			transition: all 1s ease;
		}
		.f-image {
    height: 200px;
/*    width: 100px;*/
	padding: 2px;
			
}
		.f-image img{
			height: 100%;
			width: 100%;
		}
		.f-text {
    padding: 12px;
}
		.f-text h4 {
    padding-top: 10px;
    font-size: 16px;
    font-weight: 600;
    color: #000;
    float: left;
    /* padding-left: 20px; */
}
.f-text p {
    padding-top: 41px;
    text-align: left;
    padding-bottom: 20px;
    font-size: 14px;
    line-height: 20px;
}
		.f-btn {
    padding-bottom: 14px;
			text-align: center;
}
		a.button-f {
    background: #0056b3;
    color: #ffffff;
    padding: 7px 12px;
    border-radius: 3px;
    }

</style>

@endsection

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
				<form action="/productOrder" method="post">
				@csrf
				
						<input type="hidden" name="product_id"  id="product_id" />	
                        <input type="hidden" name="product_name" id="product_name"/>
						<input type="hidden" name="product_price"  id="product_price"/>
						<input type="hidden" name="product_type" id="product_type">
                   
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

<section class="miniBanner">
    <div class="container">
    <div class="w3pvt_banner_info text-left">
				<div class="w3layouts_banner_margin">					
					<h2 class="editContent p-2 text-center">{{$pcs->prductCategoryName}}  </h2>				
				</div>
			</div>
    </div>
</section>

<section style="height: 200px; width:100%">
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4 class="text-center mt-5" >GET YOUR: <strong>{{$pcs->prductCategoryName}}   </strong> </h4>
			@if(Session::get('message'))
              <p class="text-success text-center">{{ Session::get('message') }}</p>
              {{Session::put('message',NULL)}}

              @endif
        </div>
    </div>
</div>
</section>

<section class="" style="">
<div class="container"> 
<div class="row">

@if($products->isEmpty())
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
	<h1 class="text-danger text-center mb-5">PRODUCTS NONE</h1>
	</div>
@else

	@foreach($products as $product)
	<div class="col-12 col-sm-6 mb-3 col-md-4 col-lg-3">
			<div class="f-body">
				<div class="f-image">
					<img style="height:200px; padding:2px; width:200px" src="{{asset( $product->img) }}" 	alt="image" />
				</div>
				<div class="" style="padding-top:10px;">
					<h4 style="font-size:18px;padding-bottom: 10px;">{{ $product->product_name }}</h4>
					<div style="height:60px;">
					 <p style="font-size:14px;line-height:22px;padding:0px 10px;padding-bottom:10px;">{{ $product->description }}</p>
					 </div>
              		 <p style="padding-top:10px;font-weight:600">Price: {{ $product->price }} BDT </p>
					<div class="f-btn mt-2 ">
						<a href="" class="button-f mb-4 order" data-product_type="{{$pcs->id }}" data-id="{{$product->id }}" data-name="{{ $product->product_name}}" data-price="{{$product->price }}" data-toggle="modal" data-target="#Modal">ORDER NOW</a>
					</div>
				</div>  
			</div>								
	</div>
	@endforeach
@endif
</div>
</div>
</section>



@endsection

@section('script')
<script>
$(".order").click(function(){
  //  $("p").hide();
  $("#forWhat").html($(this).data('name'));
  $("#product_id").val($(this).data('id'));
  $("#product_name").val($(this).data('name'));
  $("#product_price").val($(this).data('price'));
  $('#product_type').val($(this).data('product_type'));
  });

</script>
@stop