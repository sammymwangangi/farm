@extends('layouts.master')
@section('content')

<div class="container-fluid">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="m-4">All Users </h1>
  <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i> Add User</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ url('/dashboard/users') }}">
            @csrf

            <div class="form-group">
              <label for="name" class="col-form-label">Full Name<span class="text-danger">*</span></label>
              <input type="text" name="name" placeholder="Name..." class="form-control" id="name">
            </div>
            <div class="form-group">
                <label  for="form-username">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" placeholder="Email Address..." class="form-control"  required data-validation-required-message= "Please enter email address.">
                <div class="help-block font-small-3"></div>
            </div>
            <div class="form-group">
                <label  for="form-password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" placeholder="Password..." class="form-control"  required required data-validation-required-message= "Please enter password">
            </div>
            <div class="form-group clearfix">
              <button type="submit" class="btn btn-info float-sm-left">
                <i class="fas fa-paper-plane"></i> Submit
              </button>
              <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">
                  <i class="fas fa-trash"></i> close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">          
    <table id="users_table" class="table table-bordered table-striped tale-hover table-auto table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email Address</th>
          <th>Roles</th>
          <th>Joined Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php $i=0; @endphp
        @forelse($users as $user)
          @php $i++; @endphp
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><span class="label label-success"> @foreach($user->roles as $role){{$role->name}}</span>,@endforeach</td>
            <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
            <td>
               <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $user->id }}"><i class="fas fa-trash"></i></a>
               <a href="{{url('/dashboard/users/'.$user->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
            </td>
            <!-- ====================Delete Modal===========================  -->
            <div id="panel-modal-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                      <h5>Are you sure you want to delete this user?</h5>
                            </div>
                              <div class="modal-footer clearfix">
                    <a href="{{ url('/dashboard/delete-user/'.$user->id) }}" class="btn btn-success float-sm-left">Okay</a>
                    <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
                  </div>
                        </div>
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
           <!-- ====================End Delete Modal===========================  -->
          </tr>
          @empty
           <p>No users found</p>
         @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
