@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body">
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-4">
                    <h4 class="card-title text-white">Receive Payment</h4>
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

    <p class="card-text"><a  href="{{url('/payments/allPayments')}}" class="btn btn-info">
        <i class="icon-undo2"> </i> Go Back</a></p>
                        <hr>
       <form  method="post" action="{{url('/deposits/receivePayment')}}">
          {{csrf_field()}}
          <div class="box-body">
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payee_name">Payer's Name<i style="color: red;">*</i></label>
                    <input type="text" id="payee_name" class="form-control" value="{{old('payee_name')}}" name="payee_name">
                    @if($errors->has('payee_name'))
                       <span class="danger text-muted">{{ $errors->first('payee_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
             <!-- /.form-group -->
                <div class="form-group">
                    <label for="amount">Amount<i style="color: red;">*</i></label>
                   <input type="number" name="amount"  class="form-control" value="{{old('amount')}}" placeholder="Enter amount.">
                     @if($errors->has('amount'))
                      <span class="danger text-muted">{{ $errors->first('amount') }}</span>
                      @endif
                </div>
                </div>
          <div class="col-md-4">
              <div class="form-group {{$errors->has('payment_type') ? 'has-error':''}}">
                  <label>Type of Payment<i style="color: red;">*</i></label>
                   <select name="payment_type" class="form-control select2">
                  <option value="Cash">Cash</option>
                  <option value="Cheque">Cheque</option>
                  </select>
              </div>
              </div>
          </div> <!---end row-->
            
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="particular">Particulars<i style="color: red;">*</i></label>
                        <textarea name="particulars" class="form-control"></textarea>
                          @if($errors->has('payee_name'))
                           <span class="danger text-muted">{{ $errors->first('particular') }}</span>
                        @endif
                    </div>
                </div>
            
          </div> 
          <div class="row">
               <div class="col-md-6 col-sm-offset-6">

                   <div class="form-group">
                       <input type="submit" name="submit" class="btn btn-success" value="Receive Payment">
                   </div>
               </div> 
          </div>         
          
            
</div>
<!-- /.box-body -->
      </form>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop
