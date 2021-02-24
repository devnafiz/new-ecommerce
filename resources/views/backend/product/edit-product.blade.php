 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>

                 Edit Product
                 <a href="{{route('products.view')}}" class="btn btn-success float-right"><i class="fa fa-list-circle"></i>Product list</a>
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('products.update',$editData->id)}}" method="post" id="myForm">
                  {{csrf_field()}}

                  <div class="form-row">
                    
                    <div class="col-md-6">
                      <label for="name"> Supplier Name</label>
                      <select name="supplier_id"  class="form-control">
                            <option value=""> select supplier</option>
                            @foreach($suppliers as $supplier)
                           <option  value="{{$supplier->id}}" {{($editData->supplier_id==$supplier->id)?"selected":""}}>{{$supplier->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>

                    <div class="col-md-6">
                      <label for="name"> Category Name</label>
                      <select name="category_id" id="usertype" class="form-control">
                            <option value=""> select category</option>
                            @foreach($categories as $category)
                           <option  value="{{$category->id}}" {{($editData->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6">
                      <label for="name"> Brand Name</label>
                      <select name="brand_id"  class="form-control">
                            <option value=""> select Brand</option>
                            @foreach($brands as $brand)
                           <option  value="{{$brand->id}}" {{($editData->brand_id==$brand->id)?"selected":""}}>{{$brand->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6">
                      <label for="name"> Color Name</label>
                      <select name="color_id[]"  class="form-control select2" multiple>
                            
                           @foreach($colors as $color)
                           <option  value="{{$color->id}}"{{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}} {{($editData->color_id==$color->id)?"selected":""}}>{{$color->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6">
                      <label for="name"> Unit Name</label>
                      <select name="unit_id" id="usertype" class="form-control">
                            <option value=""> select unit</option>
                            @foreach($units as $unit)
                           <option  value="{{$unit->id}}" {{($editData->unit_id==$unit->id)?"selected":""}}>{{$unit->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6">
                      <label for="email">product Name</label>
                      <input type="text" name="name" class="form-control" value="{{$editData->name}}">
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      
                    </div>



                    
                     <div class="col-md-6">
                      <label for="name"> Size Name</label>
                      <select name="size_id[]"  class="form-control select2" multiple>
                            
                            @foreach($sizes as $size)
                           <option  value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                           @endforeach
                      </select>
                      
                    </div>
                     <div class="col-md-12">
                      <label for="name"> Short Description</label>
                      <textarea name="short_desc" class="form-control"  >{{$editData->short_desc}}</textarea>
                      
                    </div>

                    <div class="col-md-12">
                      <label for="name"> Long Description</label>
                      <textarea name="long_desc" class="form-control" rows="4" >{{$editData->long_desc}}</textarea>
                      
                    </div>
                    <div class="col-md-3">
                      <label > Price</label>
                      <input name="price" class="form-control" type="number" value="{{$editData->price}}" >
                      
                    </div>

                    <div class="col-md-3">
                      <label > Image</label>
                      <input name="image" class="form-control" type="file" id="image">
                      
                    </div>
                    <div class="col-md-3">
                        <img id="showImage" src="{{(!empty($editData->image))?url('upload/product_image/'.$editData->image):url('upload/product_image/no-image.png')}}" style="height: 105px;width: 100px; border: 1px solid #f32;">
                      
                    </div>
                     <div class="col-md-3">
                      <label > Sub Image</label>
                      <input name="sub_image[]" class="form-control" type="file" multiple>
                      
                    </div>
                    
                    
                    
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                      <input type="submit" value="update" class="btn btn-primary">
                       
                     </div>
                    
                  </div>

                  
                </form>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
$(function () {
  
  $('#myForm').validate({
    rules: {
      name:{
          required:true,
      },
      supplier_id:{
          required:true,
      },
      category_id: {
        required: true,
        
      },
       unit_id: {
        required: true,
        
      }

      
     
    },
    messages: {
        
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

  @endsection