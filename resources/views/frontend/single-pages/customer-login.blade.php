@extends('frontend.layouts.master')

@section('content')
<!-- Product -->

<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			customer login
		</h2>
	</section>

<section>
	 <div id="login">
       
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                        	  @csrf
                        @if($errors->any())
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @foreach($errors->all() as $error)
                             <strong>{{$error}}</strong><br/>
                             @endforeach 

                        </div>
                        @endif
                         @if(Session::get('msg'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                           
                             <strong>{{Session::get('msg')}}</strong><br/>
                             

                        </div>
                        @endif
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label  class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="login">
                                <i class="fa fa-user"></i> no Account yet?<a href="{{route('customer.signup')}}"><span>Singn Up</span></a>
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
  height: 320px;
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
	


@endsection