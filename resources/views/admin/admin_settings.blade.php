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
                      <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ url('/admin/update-pwd')}}" name="udpatePasswordForm" id="udpatePasswordForm">
                      <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$adminDetails->name}}">
                          </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Admin Email</label>
                          <input type="email" name="email" class="form-control" id="email" readonly="" value="{{$adminDetails->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Type</label>
                            <input type="text" name="user_type" class="form-control" id="user_type" readonly="" value="{{$adminDetails->type}}">
                          </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Current Password</label>
                          <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Password">
                          <span id="error_current_password" style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password">
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