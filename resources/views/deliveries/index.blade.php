@extends('layouts.master')
@section('content')
<!-- CREATE SETTINGS -->
<div class="container-fluid">
	<div class="card shadow-lg border-0 mb-5 bg-white rounded">
	    <div class="card-header border-0 bg-info text-white font-weight-bold">
		    Farm Settings
		</div>
	  	<div class="card-body">
	  		@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	  		<!-- Modal -->
	          <div class="modal fade text-xs-left" id="heading2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel28" aria-hidden="true">
	            <div class="modal-dialog modal-md" role="document">
	              <div class="modal-content">
	                <div class="modal-header">
	                  <h2 class="modal-title" id="myModalLabel28">New Delivery</h2>
	                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>
	                <div class="modal-body">
	                    <form action="{{ url('/deliveries') }}" method="POST" novalidate="">
							@csrf
						  	<div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputState">Farmer</label>
							      <select name="farmer_no" id="inputState" class="form-control">
							        <option selected>--Select Farmer--</option>
							        @foreach($farmers as $farmer)
							        <option value="{{ $farmer->id }}">{{$farmer->no}}</option>
							        @endforeach
							      </select>
							    </div>
							    <div class="form-group col-md-6">
							      <label for="litres">Litres</label>
							      <input type="number" name="litres" value="{{ $delivery->litres ?? ''}}" class="form-control" id="litres" placeholder="Litres..">
							    </div>
						  	</div>
						  	<div class="form-group">
						    	<label for="deliverer">Deliverer</label>
						    	<input type="name" name="deliverer" value="{{ $delivery->deliverer ?? ''}}" class="form-control" id="deliverer" placeholder="John Doe">
						  	</div>
						  
						  	<div class="form-group clearfix">
	                          <button type="submit" class="btn btn-info float-sm-left">
	                            <i class="fas fa-paper-plane"></i> Submit
	                          </button>
	                          <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">
	                              <i class="fas fa-trash"></i> close
	                          </button>
	                        </div>
						</form>
	                </div>  
	              </div>
	            </div>
	          </div>
          <!--end modal -->
          		@role('manager')
		          <p class="card-text"><button class="btn btn-primary" data-toggle="modal" data-target="#heading2">
		            <i class="fas fa-plus"></i> Create Delivery</button>
		          </p>
		          <hr>
		          <br>
		        @endrole
	          	<table class="table table-bordered table-condensed table-hover">
				  	<caption>List of users</caption>
				  	<thead>
					    <tr>
					       <th scope="col">#</th>
					       <th scope="col">FARMER NUMBER</th>
					       <th scope="col">LITRES</th>
					       <th scope="col">DELIVERER</th>
					       <th scope="col">DATE OF DELIVERY</th>
					       <th scope="col">TOTAL SALES</th>
					    </tr>
				  	</thead>
				  	<tbody>
				  		@forelse($deliveries as $delivery)
					    <tr>
					       <th>{{ $delivery->id }}</th>
					       <td>{{ $delivery->farmer_no }}</td>
					       <td>{{ $delivery->litres }}</td>
					       <td>{{ $delivery->deliverer }}</td>
					       <td>{{ $delivery->created_at }}</td>
					       <td>KSH {{ ($delivery->litres) * ($setting->price) }}</td>
					    </tr>
					    @empty
					    <p class="text-muted">No Deliveries Available!</p>
					    @endforelse
				  	</tbody>
				</table>

				<a class="btn btn-info" href="{{url('/print-deliveries')}}">Print</a>
	  	</div>
	</div>	
</div>

@stop