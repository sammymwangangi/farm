@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title">New Role</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
                <p class="card-text"><a href="{{url('/dashboard/roles')}}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Go Back</a>
                </p>
                <hr>

                <form role="form"   method="POST" action="{{ url('/dashboard/addrole') }}" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label  for="form-username">Role Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" placeholder="Role Name..." class=" form-control"  required>
                    </div>
                    <div class="form-group">
                        <label  for="form-username">Display Name</label>
                        <input type="text" name="display_name" placeholder="Display Name..." class=" form-control">
                    </div>
                     <div class="form-group">
                        <label  for="form-username">Role Description</label>
                        <textarea name="description"  class=" form-control" >
                        </textarea>
                    </div>
                    <div class="form-group text-left" style="overflow: scroll; max-height: 650px; width:100%;">
                        <h3>Permissions</h3>
                        <input type="checkbox" id="toggle-all" class="checkbox">Check all
                        <hr style="margin-top: -1px;">
                        @foreach($permissions as $permission)
                        <input type="checkbox"   name="permission[]" class="checkbox" value="{{$permission->id}}" > {{$permission->display_name}} <br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" ><i class="icon-edit"></i> Create Role</button>     
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection