@extends('admin.layouts.master');

@section('content');
<x-admin-layout>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
                    <label for="titleInput">Title  :</label>
                    <label for="titleInput" lass="form-control" >{{ $post->title }}</label>
          
                  </div>
                 
                  <div class="form-group">
                        <label>Content  :</label>
                        <label for="titleInput" lass="form-control" >{{ $post->content }}</label>
                
                    </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File  :</label>
                    <label for="titleInput" lass="form-control" > <img src="{{ url($post->file_path)}}" width="200px"></label>
                    
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ route('admin.post') }}" class="btn btn-primary">Back</a>
                </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
</x-admin-layout>
@endsection