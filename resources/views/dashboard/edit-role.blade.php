@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title">Update Role</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
                <p class="card-text"><a href="{{url('/dashboard/roles')}}" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Go Back</a>
                </p>
                <hr>
                <!-- Update Modal -->
                <form role="form"   method="POST" action="{{ url('/dashboard/edit-role/'.$role->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label  for="form-username">Role Name</label>
                        <input type="text" name="name" class=" form-control"  value="{{$role->name}}">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">Display Name</label>
                        <input type="text" name="display_name"   value="{{$role->display_name}}" class=" form-control">
                    </div>
                     <div class="form-group">
                        <label  for="form-username">Role Description</label>
                    <input type="text" class="form-control" name="description" id="" value="{{$role->description}}">
                    </div>
                 
                        <div class="form-group text-left" style="overflow: scroll; max-height: 650px; width:100%;">
                            <h3>Permissions</h3>
                            <input type="checkbox" id="toggle-all" class="checkbox">Check all
                            <hr style="margin-top: -1px;">
                            @foreach($permissions as $permission)
                           <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}  class="checkbox" name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
                            @endforeach
                        </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" ><i class="fas fa-edit"></i> Update Role</button>     
                      </div>
                </form>                     
                <!-- End Update Modal -->
            </div>
        </div>
    </div>
</div>
@endsection