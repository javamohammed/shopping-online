@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Update Admin Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if (Session::has("error_message"))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
                          {{Session::get('error_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                    @endif
                    @if (Session::has("success_message"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                          {{Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                    @endif
                    @if ($errors->any())
                          <div class="alert alert-danger" style="margin: 10px;width: 50%;">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                      @endif
                <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/update-admin-details')}}" name="updateAdminDetails" id="updateAdminDetailsForm">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$adminDetails->name}}">
                          </div>  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Admin Email</label>
                          <input type="email" name="email" class="form-control" id="email" readonly value="{{$adminDetails->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Type</label>
                            <input type="text" name="user_type" class="form-control" id="user_type" readonly  value="{{$adminDetails->type}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="mobile"  value="{{$adminDetails->mobile}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/*" >
                            @if (!empty($adminDetails->image))
                            <img class="rounded-circle" style="margin-top: 5px" alt="100x100" width="100" height="100" src="{{url('images/admin_images/admin_photos/'.$adminDetails->image)}}"
                            data-holder-rendered="true">
                                <input type="hidden" value="{{$adminDetails->image}}" name="current_image" />
                            @endif
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
                
            </div>
        </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection