@extends('layouts.master');

@section('content');
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width: 52rem;" >
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form method="POST" action="{{ route('editpostsave', $post->id) }}" enctype="multipart/form-data" >
              @csrf
              @method('PUT')


                <div class="card-body">
                  <div class="form-group">
                    <label for="titleInput">Title</label>
                    <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="titleInput" placeholder="Enter title">
                  </div>
                 
                  <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Enter Content"> {{ $post->content }}</textarea>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" value="{{ $post->file_path }}" class="custom-file-input" id="file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>    
        
        <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div> -->
        </div>
    </div>

@endsection