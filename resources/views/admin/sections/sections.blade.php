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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($sections as $section)
                        <tr>
                          <td>{{$section->id}}</td>
                          <td>{{$section->name}}</td>
                          <td>
                            @if ($section->status == 1 )
                              <i id="{{$section->id}}" class="fas fa-check-circle active change-status-section" style="color: green; cursor: pointer;"></i>
                            @else
                            <i id="{{$section->id}}" class="fas fa-ban inactive change-status-section" style="color: red; cursor: pointer;"></i> 
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