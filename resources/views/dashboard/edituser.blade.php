@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title"> Update User Details</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
                <p class="card-text"><a href="{{url('/dashboard/users')}}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Go Back</a>
                </p>
                <hr>
                <form role="form" method="POST" action="{{ url('/dashboard/users/'.$user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label  for="form-username">Full Name</label>
                        <input type="text" name="name" id="form-username" value="{{$user->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label  for="form-username">Email Address </label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control">
                    </div>
                    <div class="form-group text-left">
                        <h6>Roles</h6>
                        <input type="checkbox" class="checkbox" id="toggle-all" >Check all
                        <hr style="margin-top: -1px;">
                        @foreach($roles as $role)
                       <input type="checkbox" {{in_array($role->id,$role_users)?"checked":""}}  class="checkbox" name="roles[]" value="{{$role->id}}" > {{$role->name}} <br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" ><i class="fas fa-edit"></i> Update User</button>     
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection