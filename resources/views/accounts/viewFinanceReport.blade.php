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
                    <h4 class="card-title text-white">Financial Summary</h4>
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
                        <p class="card-text"><a  href="{{url('/finance/report')}}" class="btn btn-info">
                            <i class="icon-undo2"> </i> Go Back</a></p>
                        <hr>
        <section class="basic-select">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <label class="card-title" for="basicSelect">Financial summary</label>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                   <table class="table table-bordered mb-0">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Income from Fees</th>
                                       <th>Income from other sources</th>
                                       <th>Payments(Expenses)</th>
                                       <th>Account Balance</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                  
                                             <td>KSH: {{$fees}}</td>
                                  
                                     @if (count($deposits)>0)
                                         
                                              <td>KSH: {{$deposits}}</td>
                                    @else
                                        <td>0</td>
                                     @endif
                                     @if (count($payments) > 0)
                                        <td>KSH: {{$payments}}</td>
                                
                                    @else
                                    <td>0</td>
                                     @endif
                                     <td>KSH: {{$balance}}</td>
                                   </tr>
                               </tbody>
                           </table>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop
