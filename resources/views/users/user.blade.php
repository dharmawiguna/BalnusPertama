@extends('layouts.master')


@section('content')

	 <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              		@foreach($users as $user)
                  <tr>
                    <td>{{$user['first_name']}} {{$user['last_name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td><img src="{{$user['avatar']}}"></td>
                    <td>
                    	<button id="detail" type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#detailModal"
                      data-id="{{$user['id']}}"
                      data-first_name="{{$user['first_name']}}"
                      data-last_name="{{$user['last_name']}}"
                      data-email="{{$user['email']}}"
                      data-avatar="{{$user['avatar']}}"
                      >Detail</button>
                    </td>
                  </tr>
                 
                  
                	@endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  
  
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background:none; border:none;">
          X
        </button>
      </div>
      <div class="modal-body" >
          <div class="container-fluid" align="center">
            <div class="row" >
                  <div class="col-4">
                      <img src="" id="avatar_preview" style="width: 150px; height: auto;" >
                  </div>
                  <div class="col-8">
                      <div class="row ml-2">
                          <label>Name :</label>
                          <h5 id="firstName" class="mr-2 ml-2"></h5><h5 id="lastName"></h5>
                      </div>
                      <div class="row ml-2">
                          <label>Email :</label>
                          <span id="email" class="ml-2"></span>
                      </div>
                  </div>  
            </div>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var id = $(this).data('id');
            var firstName = $(this).data('first_name');
            var lastName = $(this).data('last_name');
            var email = $(this).data('email');
            $('#firstName').text(firstName);
            $('#lastName').text(lastName);
            $('#email').text(email);
            $('#avatar_preview').attr('src', $(this).data('avatar'));
            
        })
  })
</script>
@endsection

