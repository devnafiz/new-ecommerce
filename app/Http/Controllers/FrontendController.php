<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\ProductSubImage;
use DB;

class FrontendController extends Controller
{
     public function index()
    {
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        //dd( $data['categories']);
        $data['products']=Product::orderBy('id','desc')->paginate(3);
        //dd($data['products']);
    	return view('frontend.layouts.home',$data);
    }

    public function productList(){
         $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
       $data['products']=Product::orderBy('id','desc')->paginate(3);
         return view('frontend.single-pages.product-list',$data);
    }
    public function categoryWiseProduct($category_id){

        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
       $data['products']=Product::where('category_id',$category_id)->orderBy('id','desc')->get();
         return view('frontend.single-pages.category-wise-product',$data);
    }
    public function brandWiseProduct($brand_id){

        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
       $data['products']=Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
         return view('frontend.single-pages.brand-wise-product',$data);
    }
    public function productDetails($id){
           $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
       $data['products']=Product::where('id',$id)->first();
       $data['product_sub_image']=ProductSubImage::where('product_id', $data['products']->id)->get();
       $data['product_colors']=ProductColor::where('product_id', $data['products']->id)->get();
       $data['product_sizes']=ProductSize::where('product_id', $data['products']->id)->get();
         return view('frontend.single-pages.product-details',$data);

    }

    public function aboutus(){
    	//dd('ok');

    	return view('frontend.single-pages.about-us');
    }

     public function login(){
         //dd('ok');
    	return view('auth.login');
    }
    public function shoppingCart(){
    	return view('frontend.single-pages.shopping-cart');
    }
}
