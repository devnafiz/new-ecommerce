@extends('frontend.layouts.master')

@section('content')
<!-- Product -->

<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			customer signup
		</h2>
	</section>

<section>
	 <div id="login">
       
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="myForm" class="form" action="{{route('signup.store')}}" method="post">
                          @csrf
                            <h3 class="text-center text-info">Sign Up</h3>

                            <div class="form-group">
                                <label  class="text-info">Full name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                                <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">mobile No:</label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                                <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                 <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">

                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="sign Up">
                                <i class="fa fa-user"></i> have you Account ?<a href="{{route('customer.login')}}"><span>Singn Up</span></a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <style type="text/css">
    	#login .container #login-row #login-column #login-box {
  margin-top: 10px;
  max-width: 600px;
 
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  margin-bottom: 30px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>	
     <script>
$(function () {
  
  $('#myForm').validate({
    rules: {
      name: {
        required: true,
       
      },
      email: {
        required: true,
        email: true,
      },
      mobile: {
        required: true,
        
      },
      password: {
        required: true,
        minlength: 9
      },
      confirm_password:{
        required: true,
         equalTo:'#password'
      },
     
    },
    messages: {
       name: {
        required: "Please  Enter Full name",
        
      },
      mobile: {
        required: "Please  Enter Mobile No",
        
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm_password: {
        required: "Please provide a password",
        equalTo: "Your password not match"
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