<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\ProductSubImage;
use DB;
use Cart;
use App\Brand;
use App\Color;
use App\Size;
use App\User;
use Mail;
use App\Shipping;
use App\Payment;
use App\Order;
use App\OrderDetail;
use Session;
use Auth;


class CheckoutController extends Controller
{
    public function customerLogin(){

     return view('frontend.single-pages.customer-login');
    }

    public function customerSignup(){

    	 return view('frontend.single-pages.customer-signup');
    }

    public function signupStore(Request $request){

    	DB::transaction(function() use($request){

    		 $this->validate($request,[
		        'name'=>'required',
		        'email'=>'required|unique:users,email',
		        'mobile'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
		        'password'=>'min:9|required_with:confirm_password|same:confirm_password',
		        'confirm_password'=>'min:9'

		    ]);
    		 $code=rand(0000,9999);
    		 $user=new User();
    		 $user->name=$request->name;
    		 $user->email=$request->email;
    		 $user->mobile=$request->mobile;
    		 $user->password=bcrypt($request->password);
    		 $user->code=$code;
    		 $user->status='0';
    		 $user->usertype='customer';
    		 $user->save();
    		 $data=array(

               
                'email'=>$request->email,
                'code'=>$code,


    		 );
    		 Mail::send('frontend.emails.verify-mail',$data,function($message) use($data){
               $message->from('namfiz016@gmail.com','nafiz bd');
               $message->to($data['email']);
               $message->subject('confirm email');

    		 });


    	});
   
       return redirect()->route('email.verify')->with('success','Please verify your email');
    }

    public function emailVerify(){
        return view('frontend.single-pages.email-verify');

    }

    public function verifyStroe(Request $request){
        $this->validate($request,[
		        
		        'email'=>'required',
		        'code'=>'required'
		        

		    ]);
        $checkData=User::where('email',$request->email)->where('code',$request->code)->first();
       if($checkData){
          $checkData->status='1';
          $checkData->save();
          return redirect()->route('customer.login')->with('success','Verifyid your account');
       }else{
       	return redirect()->back()->with('error','sorry email or code not match ');
       }
    }

    public function checkOut(){

       return view('frontend.single-pages.customer-checkout');
    }

    public function checkutStore(Request $request){
     $this->validate($request,[
            'name'=>'required',
           
            'mobile_no'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'=>'required'
          

        ]);
      $checkout=new Shipping;
      $checkout->name=$request->name;
      $checkout->email=$request->email;
      $checkout->mobile_no=$request->mobile_no;
      $checkout->address=$request->address;
      $checkout->user_id=Auth::user()->id;

      $checkout->save();
      Session::put('shipping_id',$checkout->id);
       return redirect()->route('customer.payment')->with('success','data save  successfully');

    }
}
