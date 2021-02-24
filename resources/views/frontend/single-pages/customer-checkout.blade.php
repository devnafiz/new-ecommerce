@extends('frontend.layouts.master')

@section('content')
<!-- Product -->

<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Billing Information
		</h2>
	</section>
<section>
	
       
        <div class="container">
                 <div class="row">
                    <div  class="col-md-6">
                        <form id="myForm" class="form" action="{{route('customer.checkout.store')}}" method="post">
                          @csrf
                          

                            <div class="form-group">
                                <label  class="text-info">Full name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label  class="text-info">mobile No:</label><br>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control">
                                <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info"> Address:</label><br>
                                <input type="text" name="address" id="address" class="form-control">
                                <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                            </div>

                            
                           
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="sign Up">
                               
                            </div>
                            
                        </form>
                    </div>
                </div>
          </div>
   
</section>	

  <script>
$(function () {
  
  $('#myForm').validate({
    rules: {
      name: {
        required: true,
       
      },
      address: {
        required: true,
        
      },
      mobile_no: {
        required: true,
        
      },
     
     
    },
    messages: {
       name: {
        required: "Please  Enter Full name",
        
      },
      mobile_no: {
        required: "Please  Enter Mobile No",
        
      },
      address: {
        required: "Please enter a  address",
        
      },
    
      
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

	


@endsection