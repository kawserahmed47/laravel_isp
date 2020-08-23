@extends('user.master')
@section('title'){{$title}}@stop
@section('content')


<section class="miniBanner">
    <div class="container">
    <div class="w3pvt_banner_info text-left">
				<div class="w3layouts_banner_margin">					
					<h2 class="editContent p-2 text-center">{{$mediasCat->mediaCategoryName}}  </h2>				
				</div>
			</div>
    </div>
</section>

<section style="height: 100px; width:100%">
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4 class="text-center mt-5" >GET YOUR: <strong>{{$mediasCat->mediaCategoryName}}   </strong> </h4>
        </div>
    </div>
</div>
</section>

<section class="mb-5 " style="">
<div class="container "> 
<div class="row ">
<div class="col">
    <div class="card p-3  bg-white rounded " >
<table class="table  text-center p-5 table-borderless">
  <thead class="thead-dark " >
    <tr class="">
      
      <th scope="col">Server Name</th>
      <th scope="col">Address</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($medias as $media)
    <tr>
      <td>{{ $media->name }}</td>
      <td> <a href="{{ $media->link }}" class="btn btn-success" target="_blank" >Visit Now</a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>
  

</div>
</div>
</div>
</div>
</div>
</section>

@endsection