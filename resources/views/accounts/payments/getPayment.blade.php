@extends('layouts.master')
@section('content')
<div class="content-header row hidden-print">
<div class="content-header-left col-md-6 col-xs-12">
<h3 class="content-header-title mb-0">View Payment Record</h3>
</div>
<div class="content-header-right col-md-6 col-xs-12">
          <form action="{{ url('/payments/printPayment') }}" method="get" >
                    <input type="hidden" name="id" value="{{$id}}">
<button type="submit" class="btn btn-primary float-sm-right">
    <i class="icon-print"></i> Print Fee Payment</button>         
        </form>
</div>
<div class="content-header-lead col-xs-12 mt-1">
<p class="lead"></p>
</div>
</div>
<div class="content-body">
            	<section class="card">
	<div id="invoice-template" class="card-block">
		<div id="invoice-company-details" class="row">
			<div class="col-md-4 col-sm-4 text-xs-center text-md-left">
				<img src="{{asset('/images/'.$setting->logo) ?? ''}}" alt="KSMS LOGO" class=""/>
			</div>
			<div class="col-md-8 col-sm-8 text-xs-center">
				<h2 class="ml-20">{{strtoupper($setting->school_name) ?? ''}}</h2>
				<ul class="px-0 list-unstyled">
	<li class="lead text-bold-400">{{$setting->box_address ?? ''}},{{$setting->location ?? ''}}</li>
	<li class="lead text-bold-400"><i>Motto:{{$setting->motto ?? ''}}</i></li>
				</ul>
			</div>
		</div>
<div id="invoice-items-details" class="pt-2">
            <table class="table">
            <tr>
                <td>
                    @foreach($records as $record)
                    <h6>Payment Voucher No: .........</h6>
                    <h6><strong>Payee's Name and Address:</strong> {{$record->payee_name}}<br> {{$record->address}}</h6>
                </td>
            </tr>
        </table>
            
            
        
        </div><!--end row-->

        <table class="table  table-condensed">
            <tr>
                <th>DATE</th>
                <th>PARTICULARS</th>
                <th>AMOUNT</th>
            </tr>
            <tr>
                <td>{{$record->created_at}}</td>
                <td>{{$record->particulars}}</td>
                <td>{{$record->amount}}</td>
            </tr>
        </table>
        @endforeach
        <table class="table">
            <tr>
                <td><h5>Payment Authorised by ........................................................</h5></td>
                <td><h5>Cash/Cheque No ............</h5></td>
            </tr>
            <tr>
                <td><h4>Date.....................</h4></td>
            </tr>
        </table>        
        @foreach($records as $record)
       <table class="table table-bordered table-condensed">
          <thead>
              <tr>
              <th>VOTEHEADS</th>
              <th>DESCRIPTION</th>
              </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->description}}</td>
          </tr>
          </tbody>
            @endforeach              
        </table>
  </div>
</section>
</div>
@endsection