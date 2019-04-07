@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row mt-4">
        @permission('VIEW-COMMENT')
        <div class="col-xl-4 col-lg-6 col-xs-12">
            <div class="card shadow p-3 border-0 bg-danger mb-5 rounded text-white">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left align-self-center mr-3">
                                <span style="font-size: 3em; color: white;">
                                  <i class="fas fa-comments"></i>
                                </span>
                            </div>
                            <div class="media-body text-sm-center">
                                <h2>{{$comments ?? ''}}</h2>
                                <span>Total Comments</span>
                                <hr>
                                <a class="text-white" href="{{url('dashboard/comments')}}">View Comments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endpermission
        @permission('VIEW-FARMER')
        <div class="col-xl-4 col-lg-6 col-xs-12">
            <div class="card shadow p-3 border-0 mb-5 rounded text-white" style="background-color: #2978B6">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left align-self-center mr-3">
                                <span style="font-size: 3em; color: white;">
                                  <i class="fas fa-users"></i>
                                </span>
                            </div>
                            <div class="media-body text-sm-center">
                                <h2>{{$farmers ?? ''}}</h2>
                                <span>Total Farmers</span>
                                <hr>
                                <a class="text-white" href="{{url('/farmers')}}">Manage Farmers</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endpermission
         @permission('VIEW-EMPLOYEE')
           <div class="col-xl-4 col-lg-6 col-xs-12">
            <div class="card shadow p-3 border-0 text-white mb-5 rounded" style="background-color: violet">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left align-self-center mr-3">
                                <span style="font-size: 3em; color: white;">
                                  <i class="fas fa-briefcase"></i>
                                </span>
                            </div>
                            <div class="media-body text-sm-center">
                                <h3>{{$employees ?? ''}}</h3>
                                <span>Employees</span>
                                <hr>
                                <a class="text-white" href="{{url('/employees')}}">Manage employees</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endpermission
        <div class="col-xl-4 col-lg-6 col-xs-12">
            <div class="card shadow p-3 border-0 mb-5 rounded text-white" style="background-color: #1ADCFF">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left align-self-center mr-3">
                                <span style="font-size: 3em; color: white;">
                                  <i class="fas fa-check"></i>
                                </span>
                            </div>
                            <div class="media-body text-sm-center">
                                <h3>{{$deliveries ?? ''}}</h3>
                                <span>Deliveries</span>
                                <hr>
                               <a class="text-white" href="{{url('/deliveries')}}">View Deliveries</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endpermission --}}
    </div>
</div>

@stop