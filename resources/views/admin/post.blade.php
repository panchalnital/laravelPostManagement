
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
                    <td> {{ $item->file_path }}</td>
                    <td>{{ $item->status }}</td>
                    <td><div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3_{{ $item->id }}">
                      <label class="custom-control-label" for="customSwitch3_{{ $item->id }}"></label>
                    </div>
                  </div></td>
                  <td> <a href="" class="btn btn-block btn-xs btn-danger">Delete</a>
                  <a href="" class="tn btn-block btn-xs btn-dark">View</a>
                    <!-- <button type="button" class="btn btn-block btn-xs btn-danger"></button>
                  <button type="button" class="btn btn-block btn-xs btn-dark">View</button></td> -->
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

