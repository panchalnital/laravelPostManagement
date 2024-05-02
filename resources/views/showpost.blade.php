@extends('layouts.master');

@section('content');
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width: 52rem;" >
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


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
                  <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                </div>
            </div>    
        
        </div>
    </div>

@endsection