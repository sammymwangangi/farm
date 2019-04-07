@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="card m-3">
    <div class="card-header bg-info">
        <h4 class="card-title">User Roles</h4>
    </div>
    <div class="card-body">
        <div class="card-block">
          <p class="card-text"><a href="{{url('/dashboard/addrole')}}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Role</a>
          </p>
          <hr>
          <table id="users_table" class="table table-bordered table-condensed table-hover">
              <thead>
                  <tr class="">
                    <th>#</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @php $i=0; @endphp
                  @forelse($roles as $role)
                   @php $i++; @endphp
                <tr>
                  <td>{{ $i}}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>{{ $role->description }}</td>
                  <td>
                      <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $role->id }}"><i class="fas fa-trash"></i></a>
                      <a href="{{url('/dashboard/edit-role/'.$role->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  </td>
                    <!-- ====================Delete Modal===========================  -->
                    <div id="panel-modal-{{ $role->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              <h5>Are you sure you want to delete this role?</h5>
                                    </div>
                                      <div class="modal-footer clearfix">
                            <a href="{{ url('/dashboard/delete-role/'.$role->id) }}" class="btn btn-success float-sm-left">Okay</a>
                            <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
                          </div>
                                </div>
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- ====================End Delete Modal===========================  -->
                </tr>
                @empty
                <p>No roles found</p>
                @endforelse
              </tbody>
          </table>
        </div>
    </div>
  </div>

</div>
<!--/ Zero configuration table -->
@endsection
