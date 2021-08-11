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
                <h3 class="card-title">Categories:</h3>
              </div>
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <a href="{{url('admin/add-edit-category')}}" style="display: inline; float: right; font-size: 2rem"><i class="fas fa-plus"></i></a>
                  <table id="categories" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td>{{$category->category_name}}</td>
                          <td>
                            @if ($category->status == 1 )
                              <i id="{{$category->id}}-category" class="fas fa-check-circle active change-status-category" style="color: green; cursor: pointer;"></i>
                            @else
                            <i id="{{$category->id}}-category" class="fas fa-ban inactive change-status-category" style="color: red; cursor: pointer;"></i> 
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              



            </div>
          </div>
          
      </div>
  </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection