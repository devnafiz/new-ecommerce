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
use Auth;
use App\User;
class CartController extends Controller
{
     public function addToCart(Request $request)
    {
    	$this->validate($request,[
            'size_id'=>'required',
            'color_id'=>'required'

    	]);
         $product=Product::where('id',$request->id)->first();
         $product_size=Size::where('id',$request->size_id)->first();
         $product_color=Color::where('id',$request->color_id)->first();
    	Cart::add([
             'id'=>$product->id,
             'qty'=>$request->qty,
             'price'=>$product->price,
             'name'=>$product->name,
             'weight'=>550,
             'options'=>[
                  'size_id'=>$request->size_id,
                  'size_name'=>$product_size->name,
                   'color_id'=>$request->color_id,
                  'color_name'=>$product_color->name,
                  'image'=>$product->image
             ],
    	]);
    	return redirect()->route('show.cart')->with('success','cart insert');
    }

    public function showCart(Request $request){

    	return view('frontend.single-pages.shopping-cart');
    }

    public function updateCart(Request $request){

         Cart::update($request->rowId,$request->qty);
         return redirect()->route('show.cart')->with('success','cart updated');
    }

    public function deleteCart($rowId){

      Cart::remove($rowId);
      return redirect()->route('show.cart')->with('success','cart deleted successfully');
    }
}
