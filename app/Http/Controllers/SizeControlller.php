<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Color;
use App\Size;

class SizeControlller extends Controller
{
     public function view(){


    //dd('ok');
     	$allData=Size::all();
     	return view('backend.size.view-size',compact('allData'));
     }


     public function add(){

     	return view('backend.size.add-size');
     }

     public function store(Request $request){
        $this->validate($request,[
          'name'=>'required|unique:sizes,name'

        ]);
     	$size=new Size;

     	$size->name=$request->name;
     	
     	$size->created_by=Auth::user()->id;
     	$size->save();
     	return redirect()->route('sizes.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$editData=Size::find($id);

     	//dd($editData);
     	return view('backend.size.edit-size',compact('editData'));
     }

     public function update(Request $request,$id){
            $this->validate($request,[
          'name'=>'required|unique:sizes,name'

        ]);
     	$size=Size::find($id);

     	$size->name=$request->name;
     	
     	$size->updated_by=Auth::user()->id;
     	$size->save();
     	return redirect()->route('sizes.view')->with('success','data updated Successfully');
     }

     public function delete($id){

     	$size=Size::find($id);

     	$size->delete();


     	return redirect()->route('sizes.view')->with('Success','Unit deleted Successfully!');
     }
}
