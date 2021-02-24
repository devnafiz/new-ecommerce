 
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

                 Product Details
                
                </h3>
                 <a href="{{route('products.view')}}" class="btn btn-success float-right"><i class="fa fa-list"></i>  Product list</a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                  <tbody>
                  <tr>
                    <td>Category</td>
                    <td>{{$product['category']['name']}}</td>
                  </tr>
                  <tr>
                    <td>brand</td>
                    <td>{{$product['brand']['name']}}</td>
                  </tr>
                  <tr>
                    <td>product name</td>
                    <td>{{$product->name}}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td>{{$product->price}}</td>
                  </tr>
                  <tr>
                    <td>Short description</td>
                    <td>{{$product->short_desc}}</td>
                  </tr>
                  <tr>
                    <td>long description</td>
                    <td>{{$product->long_desc}}</td>
                  </tr>
                  <tr>
                    <td>Image</td>
                    <td><img id="showImage" src="{{(!empty($product->image))?url('upload/product_image/'.$product->image):url('upload/product_image/no-image.png')}}" style="height: 105px;width: 100px; border: 1px solid #f32;"></td>
                  </tr>

                  <tr>
                    <td>Colors</td>
                    <td>@php
                      $colors=App\ProductColor::where('product_id',$product->id)->get();
                     @endphp

                     @foreach($colors as $color)
                     <span>{{ $color['color']['name']}}</span>,

                     @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>Size</td>
                    <td>@php
                      $sizes=App\ProductSize::where('product_id',$product->id)->get();
                     @endphp

                     @foreach($sizes as $size)
                     <span>{{ $size['size']['name']}}</span>,

                     @endforeach
                    </td>
                  </tr>

                  <tr>
                    <td>Sub Image</td>
                    <td>@php
                      $subImages=App\ProductSubImage::where('product_id',$product->id)->get();
                     @endphp

                     @foreach($subImages as $img)
                    <img src="{{url('upload/product_image/product_sub_images/'.$img->sub_image)}}" width="100px" height="110px">

                     @endforeach
                    </td>
                  </tr>

                
                  </tbody>
                  
                </table>
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

  @endsection