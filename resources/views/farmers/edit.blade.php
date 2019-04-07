@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card m-3">
        <div class="card-header bg-info">
            <h4 class="card-title">Update Farmer</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
                <p class="card-text"><a href="{{url('/farmers')}}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Go Back</a>
                </p>
                <hr>       
                <form class="form-horizontal" method="post" action="{{ url('/farmers/update/'.$user->id) }}"  novalidate="">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">

                    <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i> Employee Information</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput1">ID Number</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="ID Number" value="{{$user->nid}}" name="nid" required data-validation-required-message= "id number is required">
                                        <div class="help-block font-small-3"></div>
                                        @if ($errors->has('nid'))
                                            <span class="text-danger">{{$errors->first('nid')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput2">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" name="name" required data-validation-required-message= "name is required">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput2">Farmer's Number</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Last Name"  value="{{$user->no}}" name="no" required data-validation-required-message= "number is required">
                                            <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput2">Account Number</label>
                                    <div class="col-md-8">
                                        <div class='input-group'>
                                            <input type='text' class="form-control" name="acno" value="{{$user->acno}}" placeholder="Account Number" required>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput2">Phone Number</label>
                                    <div class="col-md-8">
                                        <div class='input-group'>
                                            <input type='number' class="form-control" name="phone"  value="{{$user->phone}}" placeholder="phone number" required>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="userinput2">Email</label>
                                    <div class="col-md-8">
                                        <input type='email' class="form-control" name="email" value="{{$user->email}}" placeholder="email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-md-4 label-control" for="userinput2">Locality</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="locality"  value="{{$user->locality}}" name="locality" required data-validation-required-message= "lastname is required">
                                <div class="help-block font-small-3"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Update details
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<!--/ Zero configuration table -->
@stop
