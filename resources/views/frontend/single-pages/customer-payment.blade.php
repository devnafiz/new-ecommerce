@extends('frontend.layouts.master')

@section('content')

  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
		customer payment
		</h2>
	</section>
		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th >Product name</th>
								<th ></th>
								<th >clor</th>
								<th >Size</th>
								<th >Price</th>
								<th >Quantity</th>
								<th >Total</th>
								<th >action</th>
							</tr>
                      @php
                      $contents=Cart::content();
                      $total=0;
                      @endphp
                     

                      @foreach($contents as $content)
							<tr class="table_row">

								<td >{{$content->name}}</td>
								<td >
									<div class="how-itemcart1">
										<img src="{{asset('upload/product_image/'.$content->options->image)}}" alt="IMG">
									</div>
								</td>
								
								<td > {{$content->options->color_name}}</td>
								<td > {{$content->options->size_name}}</td>
								<td >$ {{$content->price}}</td>
								<td >
                                  <form method="post" action="{{route('update.cart')}}">
                                  	@csrf

                                  	<div>
										
										<input type="number" name="qty" id="qty"  value="{{$content->qty}}" class="form-control num-product sss mtext-104 cl3 txt-center mtext-104">
										<input type="hidden" name="rowId" id="rowId" value="{{$content->rowId}}">
										<input type="submit"  value="update" id="submitBtn" class="c12 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer  m-tb-10 flex-c-m" >
									</div>
                                  </form>

									
									<!-- <div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div> -->
								</td>
								<td >{{$content->subtotal}}</td>
								<td ><a href="{{route('delete.cart',$content->rowId)}}"><i class="fa fa-trash"></i></a></td>
							</tr>

							@php
							$total+=$content->subtotal;
							@endphp
                        @endforeach
                        <tr>
                        	<td colspan="7"></td>
                        	<td>{{$total}}</td>
                        </tr>
							
						</table>
					</div>
				</div>

				
			</div>
			 <div class="row">

					
                       
                        	<div class="col-md-4">
                        		<h4>Select Payment Method</h4>
                        	</div>
                        	<div class="col-md-8">

                        		<form method="post" action="{{route('customer.payment.store')}}">
                        			@csrf

                        			 @foreach($contents as $content)
                        			 <input type="hidden" name="product_id" value="{{$content->id}}">
                        			 @endforeach
                        			<input type="hidden" name="order_total" value="{{$total}}">
                        			  <select name="payment_method" class="form-control" id="payment_method">
                        			<option value="">slect method</option>
                        			<option value="hand cash">Hand Cash</option>
                        			<option value="Bkash">Bkash</option>
                        		</select>
                        		<font style="color: red">{{($errors->has('payment_method'))?($errors->first('payment_method')):''}}</font>
                        		<div class=" transaction_no" style="display: none;">
                        			<span>Mobile BKash :01963577002</span>
                        		   <input type="text" name="transaction_no" class="form-control form-control-sm 	" >
                        	    </div>
                        	    <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">submit</button>
                                 
                        		</form>
                        		
                        	</div>
                        	

                        
                   

                    
				
			 	
			 </div>


		</div>
	</div>


	<style type="text/css">
		.sss{
			float: left;
		}
		.s888{
			height: 40px;
			border: 1px solid #e6e6e6;
		}
	</style>


	<script type="text/javascript">
		
		$(document).on('change','#payment_method',function(){

			var payment_method=$(this).val();

			if(payment_method=='Bkash'){

             $('.transaction_no').show();
			}else{

				 $('.transaction_no').hide();
			}



		});
	</script>


@endsection