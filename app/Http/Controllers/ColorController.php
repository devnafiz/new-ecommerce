<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Color;

class ColorController extends Controller
{
     public function view(){


    //dd('ok');
     	$allData=Color::all();
     	return view('backend.color.view-color',compact('allData'));
     }


     public function add(){

     	return view('backend.color.add-color');
     }

     public function store(Request $request){
        $this->validate($request,[
          'name'=>'required|unique:categories,name'

        ]);
     	$color=new Color;

     	$color->name=$request->name;
     	
     	$color->created_by=Auth::user()->id;
     	$color->save();
     	return redirect()->route('colors.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$editData=Color::find($id);

     	//dd($editData);
     	return view('backend.color.edit-color',compact('editData'));
     }

     public function update(Request $request,$id){
            $this->validate($request,[
          'name'=>'required|unique:colors,name'

        ]);
     	$color=Color::find($id);

     	$color->name=$request->name;
     	
     	$color->updated_by=Auth::user()->id;
     	$color->save();
     	return redirect()->route('colors.view')->with('success','data updated Successfully');
     }

     public function delete($id){

     	$color=Color::find($id);

     	$color->delete();


     	return redirect()->route('colors.view')->with('Success','Unit deleted Successfully!');
     }
}
