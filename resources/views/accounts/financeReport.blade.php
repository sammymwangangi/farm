@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-4">
                    <h4 class="card-title text-white">View Financial Report</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <hr>
         <div class="card-body">
            <form method="post" action="{{ url('/finance/viewReport') }}">
                {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                     <p>Start Date</p>
                <fieldset class="form-group">
                    <input type="date" name="startDate" class="form-control singledate" id="date">
                </fieldset>
                </div>
               <div class="col-md-6">
                     <p>End Date</p>
                <fieldset class="form-group">
                    <input type="date" name="endDate" class="form-control singledate" id="date">
                </fieldset>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> View Report
                </button>
            </div>
                </form>
                </div>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>

@stop
