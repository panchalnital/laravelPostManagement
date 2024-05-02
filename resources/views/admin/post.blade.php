
@extends('admin.layouts.master');

@section('content');
<x-admin-layout>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                    <th>Approve/Reject</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($posts as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->content, 100, $end='...') }}</td>
                    <td>  <img src="{{ url($item->file_path)}}" width="50px"></td>
                    <td>{{ $item->status==1 ? "Active":"Pending"}}</td>
                    <td>
                    @if($item->status==1)
                    <a href="{{ route('admin.statusupdateno',$item->id) }}" class="fas fa-toggle-off"></a>
                    @else
                    <a href="{{ route('admin.statusupdateyes',$item->id) }}" class="fas fas fa-toggle-on"></a>
                    @endif
                      <!-- <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3_{{ $item->id }}">
                      <label class="custom-control-label" for="customSwitch3_{{ $item->id }}"></label>
                    </div>
                  </div> -->
                
                  </td>
                  <td> 
                  <form action="{{ route('admin.admindeletepost',$item->id) }}" method="POST">  
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="fas fa-trash-alt" style="padding-top: 8px;"></button>
                    </form>
                    <a href="{{ route('admin.adminshowpost',$item->id) }}" class="fas fa-eye"></a>
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
                    <th>Approve/Reject</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </x-admin-layout>
@endsection

