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
                    <h4 class="card-title text-white">Manage Payments</h4>
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
                      <div>
                        <p class="card-text"><a  href="{{url('/payments/makePayment')}}" class="btn btn-info">
                            <i class="icon-plus"></i>Make Payment</a>
                          <a  href="{{url('/deposits/RecievePayment')}}" class="btn btn-success" style="float: right;"> <i class="icon-plus"></i>Receive Payment</a></p>
                      </div>

                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
           <thead>
           <tr>
               <th>#</th>
               <th>PARTICULARS.</th>
               <th>AMOUNT</th>
               <th>VOTEHEAD</th>
               <th>DESCRIPTION</th>
               <th>DATE</th>

               <th>Action</th>
               
           </tr>
           </thead>
           <tbody>
           
           @foreach($records as $record)
               <tr>
                   <td>{{$record->id}}</td>
                   <td>
                   {{$record->particulars}}
                   </td>
                   <td>
                   {{$record->amount}}
                   </td>
                   <td>
                   {{$record->name}}
                   </td>
                   <td>
                   {{$record->description}}
                   </td>
                   
                   <td>
                   {{ date('Y-m-d', strtotime($record->created_at)) }}
                   </td>
                   <td>
                 <form action="{{url('/payments/getPayments')}}" method="get">
                 <input type="hidden" name="id" value="{{$record->id}}">
           <button type="submit" class="btn bg-navy"><i class="fa fa-fw fa-eye"></i>View Record</button>
                </form>
                   </td>
               </tr>
           @endforeach
           </tbody>
           <tfoot>
           </tfoot>
       </table>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop
