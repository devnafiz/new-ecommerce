<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Supplier;
use App\Unit;
use App\Category;
use App\Brand;
use App\Color;
use App\Size;
use App\ProductColor;
use App\ProductSize;
use App\ProductSubImage;
use DB;

class ProductController extends Controller
{
     public function view(){


    //dd('ok');
     	$allData=Product::orderBy('id','desc')->get();
     	return view('backend.product.view-product',compact('allData'));
     }


     public function add(){
         $data['suppliers']=Supplier::all();
         $data['categories']=Category::all();
         $data['brands']=Brand::all();
         $data['colors']=Color::all();
         $data['sizes']=Size::all();
         $data['units']=Unit::all();
     	return view('backend.product.add-product',$data);
     }

     public function store(Request $request){

        DB::transaction(function() use($request){

            $this->validate($request,[
              'name'=>'required|unique:products,name',
              'color_id'=>'required',
              'size_id'=>'required'

            ]);

            $product=new Product();

        $product->supplier_id=$request->supplier_id;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->name=$request->name;
        $product->short_desc=$request->short_desc;
         $product->long_desc=$request->long_desc;
        $product->price=$request->price;
        $img=$request->file('image');
        if($img){
          $imgName=date('YmdHi').$img->getClientOriginalName();
          $img->move('upload/product_image/',$imgName);
          $product['image']=$imgName;

        }
        $product->unit_id=$request->unit_id;
       
        $product->quantity='0';
        
        $product->created_by=Auth::user()->id;

        if( $product->save()){
            //product sub image data insert

            $files=$request->file('sub_image');
            if(!empty($files)){

                foreach ($files as  $file) {
                     $imgName=date('YmdHi').$file->getClientOriginalName();
                      $file->move('upload/product_image/product_sub_images/',$imgName);
                      $subimage['sub_image']=$imgName;
                      $subimage=new ProductSubImage();
                      $subimage->product_id=$product->id;
                      $subimage->sub_image=$imgName;
                      $subimage->save();
                    
                }
            }
    //product color data insert
             $colors=$request->color_id;
            if(!empty($colors)){

                foreach ($colors as  $color) {
                    
                      $mycolor=new ProductColor();
                      $mycolor->product_id=$product->id;
                      $mycolor->color_id=$color;
                      $mycolor->save();
                    
                }
            }

            //product size data insert
             $sizes=$request->size_id;
            if(!empty($sizes)){

                foreach ($sizes as  $size) {
                    
                      $mysize=new ProductSize();
                      $mysize->product_id=$product->id;
                      $mysize->size_id=$size;
                      $mysize->save();
                    
                }
            }


        }else{

            return redirect()->back()->with('error','Sorry Data not save');
        }
       


        });

     	
     	return redirect()->route('products.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=Product::find($id);
         $data['suppliers']=Supplier::all();
         $data['categories']=Category::all();
         $data['brands']=Brand::all();
         $data['colors']=Color::all();
         $data['sizes']=Size::all();
         $data['units']=Unit::all();

     	//dd($editData);
         $data['color_array']=ProductColor::select('color_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
          $data['size_array']=ProductSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','asc')->get()->toArray();
         //dd($color_array);
     	return view('backend.product.edit-product',$data);
     }

     public function update(Request $request,$id){
     	 DB::transaction(function() use($request,$id){

            $this->validate($request,[
             
              'color_id'=>'required',
              'size_id'=>'required'

            ]);

            $product=Product::find($id);

        $product->supplier_id=$request->supplier_id;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->name=$request->name;
        $product->short_desc=$request->short_desc;
        $product->price=$request->price;
        $img=$request->file('image');
        if($img){
          $imgName=date('YmdHi').$img->getClientOriginalName();
          $img->move('upload/product_image/',$imgName);
          if(file_exists('upload/product_image/',$product->image)AND !empty($product->image)){

            unlink('upload/product_image/',$product->image);
          }
          $product['image']=$imgName;

        }
        $product->unit_id=$request->unit_id;
       
        $product->quantity='0';
        
        $product->created_by=Auth::user()->id;

        if( $product->save()){
            //product sub image data insert

            $files=$request->file('sub_image');

            if(!empty($files)){
                $subImage=ProductSubImage::where('product_id',$id)->get()->toArray();

                foreach ($subImage as  $value) {
                    if(!empty($value)){

                        unlink('upload/product_image/product_sub_images/'.$value['sub_image']); 
                    }
                    # code...
                }

              ProductSubImage::where('product_id',$id)->delete();
            }
            if(!empty($files)){

                foreach ($files as  $file) {
                     $imgName=date('YmdHi').$file->getClientOriginalName();
                      $file->move('upload/product_image/product_sub_images/',$imgName);

                      $subimage['sub_image']=$imgName;
                      $subimage=new ProductSubImage();
                      $subimage->product_id=$product->id;
                      $subimage->sub_image=$imgName;
                      $subimage->save();
                    
                }
            }
    //product color data insert
             $colors=$request->color_id;
             if(!empty($colors)){
               ProductColor::where('product_id',$id)->delete();

             }
            if(!empty($colors)){

                foreach ($colors as  $color) {
                    
                      $mycolor=new ProductColor();
                      $mycolor->product_id=$product->id;
                      $mycolor->color_id=$color;
                      $mycolor->save();
                    
                }
            }

            //product size data insert
             $sizes=$request->size_id;
              if(!empty($sizes)){
               ProductSize::where('product_id',$id)->delete();

             }
            if(!empty($sizes)){

                foreach ($sizes as  $size) {
                    
                      $mysize=new ProductSize();
                      $mysize->product_id=$product->id;
                      $mysize->size_id=$size;
                      $mysize->save();
                    
                }
            }


        }else{

            return redirect()->back()->with('error','Sorry Data not save');
        }
       


        });

        
        return redirect()->route('products.view')->with('success','data save Successfully');
     }

     public function delete($id){

     	$product=Product::find($id);
        if(file_exists('upload/product_image/'.$product->image)AND !empty($product->image)){

            unlink('upload/product_image/'.$product->image);
          }

           $subImage=ProductSubImage::where('product_id',$id)->get()->toArray();
             if(!empty($subImage)){
                foreach ($subImage as  $value) {
                    if(!empty($value)){

                        unlink('upload/product_image/product_sub_images/'.$value['sub_image']); 
                    }
                    # code...
                }
             }

         ProductSubImage::where('product_id',$id)->delete();
        ProductColor::where('product_id',$id)->delete();      
        ProductSize::where('product_id',$id)->delete();
     	$product->delete();


     	return redirect()->route('products.view')->with('Success',' deleted Successfully!');
     }


     public function details($id){

       $product=Product::find($id);

       return view('backend.product.product-details',compact('product'));
     }
}
