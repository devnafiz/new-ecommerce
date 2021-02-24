@extends('frontend.layouts.master')

@section('content')
<style type="text/css">
  .prof li{

  	background: #fde;
  	border-radius: 10px;
  	margin: 2px;
  	padding: 4px;
  }
	.prof li a{


	}


</style>

  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Deshboard {{Auth::user()->name}}
		</h2>
	</section>
		
	<!-- Shoping Cart -->

	<section>
		
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="prof">
						<li><a href="">My Profile</a></li>
						<li><a href="">Password Change</a></li>
						<li><a href="">My Order</a></li>
					</ul>
					
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3">
							
						</div>
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<div class="img-circle">
										<img src="{{(!empty($user->image))?url('upload/user_image/'.$user->image):url('upload/user_image/no-image.png')}}">
										<h4 class="txt-center">{{$user->name}}</h4>
										
									</div>
									<table class="table table-bordered">
										<thead>
											
										</thead>
										<tbody>
											<tr>
												<td>Email</td>
												<td>{{$user->email}}</td>
											</tr>
											<tr>
												<td>mobile</td>
												<td>{{$user->mobile}}</td>
											</tr>
										</tbody>
										
									</table>
									<a href=""  class="btn btn-block btn-success">Edit Profile</a>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
	</section>
	


@endsection