<!DOCTYPE html>
<html lang="en">
<head>
	<title>Popularsoft E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('frontend')}}images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/main.css">
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('frontend.layouts.header')
	<!-- Slider -->
	
   @include('frontend.layouts.slider')
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<!-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button> -->
                   <a href="{{route('product.list')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">All Products</a>
                   @foreach($categories as $category)
                   <a href="{{route('category.wise.product',$category->category_id)}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">{{$category['category']['name']}}</a>
                   @endforeach
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full">
					<div class="wrap-filter flex-w w-full" style="background-color: #858585;">
				        <div>
				            <div style="padding: 20px; font-size: 25px; color: #fff">
				                Brands
				            </div>
				            <div style="padding: 0px 20px 20px 20px;">

				            	@foreach($brands as $brand)
				                <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{route('brand.wise.product',$brand->brand_id)}}" class="filter-link stext-106 trans-04" style="color: #fff">
				                   {{$brand['brand']['name']}}
				                </a>
				               @endforeach
				            </div>
				        </div>
				    </div>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{url('upload/product_image/'.$product->image)}}" alt="IMG-PRODUCT" height="200px">

							<a href="{{route('products.details.info',$product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Add to Card
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</a>

								<span class="stext-105 cl3">
									{{$product->price}} Tk
								</span>
							</div>

						</div>
					</div>
				</div>
                 @endforeach

				
			</div>
			{{$products->links()}}
		</div>
	</section>


	<!-- Footer -->
	@include('frontend.layouts.footer')
	<script src="{{asset('frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{asset('frontend')}}/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{asset('frontend')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="{{asset('frontend')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('frontend')}}/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{asset('frontend')}}/vendor/slick/slick.min.js"></script>
	<script src="{{asset('frontend')}}/js/slick-custom.js"></script>
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
	<script src="{{asset('frontend')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<script src="{{asset('frontend')}}/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="{{asset('frontend')}}/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
	<script src="{{asset('frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<script src="{{asset('frontend')}}/js/main.js"></script>

</body>
</html>