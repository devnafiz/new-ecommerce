<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
//use App\Http\Requests\CategoryRequest;
use App\Brand;

class BrandController extends Controller
{
   public function view(){


    //dd('ok');
     	$allData=Brand::all();
     	return view('backend.brand.view-brand',compact('allData'));
     }


     public function add(){

     	return view('backend.brand.add-brand');
     }

     public function store(Request $request){
        $this->validate($request,[
          'name'=>'required|unique:brands,name'

        ]);
     	$brand=new Brand;

     	$brand->name=$request->name;
     	
     	$brand->created_by=Auth::user()->id;
     	$brand->save();
     	return redirect()->route('brands.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$editData=Brand::find($id);

     	//dd($editData);
     	return view('backend.brand.edit-brand',compact('editData'));
     }

     public function update(Request $request,$id){
            $this->validate($request,[
          'name'=>'required|unique:brands,name'

        ]);
     	$brand=Brand::find($id);

     	$brand->name=$request->name;
     	
     	$brand->updated_by=Auth::user()->id;
     	$brand->save();
     	return redirect()->route('brands.view')->with('success','data updated Successfully');
     }

     public function delete($id){

     	$category=Brand::find($id);

     	$category->delete();


     	return redirect()->route('brands.view')->with('Success','Unit deleted Successfully!');
     }
}
