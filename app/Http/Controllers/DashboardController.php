<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\ProductSubImage;
use DB;
use App\User;
use Auth;
use Cart;
use App\Brand;
use App\Color;
use App\Size;
use Mail;
use App\Shipping;
use App\Payment;
use App\Order;
use App\OrderDetail;
use Session;



class DashboardController extends Controller
{
   public function dashboard(){

   	$data['user']=Auth::user();
//dd($data['user']);
   	return view('frontend.single-pages.customer-dashboard',$data);

   	//dd('ok dashboard');
   }

   public function payment(){

   		return view('frontend.single-pages.customer-payment');
   }
   public function paymentStore(Request $request){

   	
   	$this->validate($request,[
		        'payment_method'=>'required'
		        

		    ]);

   	if($request->payment_method=='Bkash' && $request->transaction_no==Null){
   		return redirect()->route('customer.payment')->with('error','You not value bkash transaction_no');
   	}
   	DB::transaction(function() use($request){
         $payment=new Payment;
         $payment->payment_method=$request->payment_method;
         $payment->transaction_no=$request->transaction_no;
         $payment->save();
         $order=new Order();
         $order->user_id=Auth::user()->id;
         $order->shipping_id=Session::get('shipping_id');
         $order->payment_id=$payment->id;
         $order_data=Order::orderBy('id','desc')->first();
         if($order_data==null){
         	$firstReg='0';
         	$order_no=$firstReg+1;
         }else{
         	 $order_data=Order::orderBy('id','desc')->first()->order_no;
         	$order_no=$order_data+1;
         }

      $order->order_no=$order_no;
       $order->order_total=$request->order_total;
       $order->status='0';
       $order->save();
       $contents=Cart::content();

       foreach ($contents as $content) {
       	$order_details=new OrderDetail();
       	$order_details->order_id=$order->id;
       	$order_details->product_id=$content->id;
       	$order_details->size_id=$content->options->size_id;
       	$order_details->color_id=$content->options->color_id;
       	$order_details->quantity=$content->qty;
       	$order_details->save();


       }


   	});

   	Cart::destroy();
   	return redirect()->route('customer.order.list')->with('success','Order Complete');


   }

   public function orderList(){

   	dd('ol');
   }
}
