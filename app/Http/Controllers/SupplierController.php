<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Auth;

class SupplierController extends Controller
{
     public function view(){


    //dd('ok');
     	$allData=Supplier::all();
     	return view('backend.supplier.view-supplier',compact('allData'));
     }


     public function add(){

     	return view('backend.supplier.add-supplier');
     }

     public function store(Request $request){

     	$supplier=new Supplier;

     	$supplier->name=$request->name;
     	$supplier->mobile_no=$request->mobile_no;
     	$supplier->email=$request->email;
     	$supplier->address=$request->address;
     	$supplier->created_by=Auth::user()->id;
     	$supplier->save();
     	return redirect()->route('suppliers.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$editData=Supplier::find($id);

     	//dd($editData);
     	return view('backend.supplier.edit-supplier',compact('editData'));
     }

     public function update(Request $request,$id){
     	$supplier=Supplier::find($id);

     	$supplier->name=$request->name;
     	$supplier->mobile_no=$request->mobile_no;
     	$supplier->email=$request->email;
     	$supplier->address=$request->address;
     	$supplier->updated_by=Auth::user()->id;
     	$supplier->save();
     	return redirect()->route('suppliers.view')->with('success','data updated Successfully');
     }

     public function delete($id){

     	$supplier=Supplier::find($id);

     	$supplier->delete();


     	return redirect()->route('suppliers.view')->with('Success','supplier deleted Successfully!');
     }


}

