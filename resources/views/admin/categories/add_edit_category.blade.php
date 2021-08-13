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
                <h3 class="card-title">{{$title}}</h3>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger" style="margin: 10px;width: 50%;">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
              @endif
              
              <form action="{{url('/admin/add-edit-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                  <div class="card-header">
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">

                          <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" placeholder="Enter Category Name">
                          </div>
                          
                        <div class="form-group">
                          <label>Select Category Level</label>
                          <select class="form-control select2" style="width: 100%; text-indent: calc(50% - 60px);" name="parent_id">
                            <option value="0">Main Category</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Discount</label>
                          <input type="number" value="0" class="form-control" name="category_discount" id="exampleInputEmail1" placeholder="Enter Category Discount">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Category Description</label>
                          <textarea rows="5" cols="5" class="form-control" name="description" id="exampleInputEmail1" placeholder="Enter Category Description"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Meta Description</label>
                          <textarea rows="5" cols="5" class="form-control" name="meta_description" id="exampleInputEmail1" placeholder="Enter Meta Description"></textarea>
                      </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Select Section</label>
                          <select class="form-control select2" style="width: 100%; height: 100px;" name="section_id">
                            @foreach ($sections as $section)
                                  <option value="{{ $section->id}}">{{ $section->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputFile">Category Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="category_image" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Category URL</label>
                          <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Category URL">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Meta Title</label>
                          <textarea rows="5" cols="5" class="form-control" name="meta_title" id="exampleInputEmail1" placeholder="Enter Meta Title"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Meta Keywords</label>
                          <textarea rows="5" cols="5" class="form-control" name="meta_keywords" id="exampleInputEmail1" placeholder="Enter Meta Keywords"></textarea>
                      </div>

                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                  </div>
                </div>
                <!-- /.card -->
            </form>
            </div>
          </div>
          
      </div>
  </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection