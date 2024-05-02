
            
@extends('layouts.master');

@section('content');
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description </th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($posts as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->content, 100, $end='...') }}</td>
                    <td> <img src="{{ url($item->file_path)}}" width="50px"></td>
                    <td>{{ $item->status==2 ? "Pending":"Active" }}</td>
                  <td>
                  
                  <a href="{{ route('editpost',$item->id) }}" class="fas fa-edit"></a>
                    <form action="{{ route('deletepost',$item->id) }}" method="POST">  
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="fas fa-trash-alt" style="padding-top: 8px;"></button>
                    </form>
                    <a href="{{ route('showpost',$item->id) }}" class="fas fa-eye"></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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
</div>
@endsection

