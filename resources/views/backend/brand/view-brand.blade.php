 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand </li>
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

                 Brands list
                 
                </h3>
                <a href="{{route('brands.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i></a>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                   
                    <th>Name</th>
                    
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key=>$brand)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$brand->name}} </td>
                     @php
                    $brand_count=App\Product::where('brand_id',$brand->id)->count();

                    @endphp
                    
                    <td><a href="{{route('brands.edit',$brand->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                      @if($brand_count<1)
                      <a href="{{route('brands.delete',$brand->id)}}" id="deleta" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      @endif
                    </td>
                  </tr>
                 @endforeach
                
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