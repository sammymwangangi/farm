@extends('layouts.master')
@section('content')
<!-- CREATE SETTINGS -->
<div class="container-fluid">
	<div class="card shadow-lg border-0 mb-5 bg-white rounded">
	    <div class="card-header border-0 bg-info text-white font-weight-bold">
		    Farm Settings
		</div>
	  	<div class="card-body">
			<form action="{{ url('/settings') }}" method="POST" novalidate="">
				@csrf
			  	<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="date">FROM</label>
				      <input type="date" name="from" value="{{ $setting->from ?? ''}}" class="form-control" id="date" placeholder="From">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="to">TO</label>
				      <input type="date" name="to" value="{{ $setting->to ?? ''}}" class="form-control" id="to" placeholder="To">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<label for="price">PRICE</label>
			    	<input type="number" name="price" value="{{ $setting->price ?? ''}}" class="form-control" id="price" placeholder="KSHs..">
			  	</div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
	  	</div>
	</div>	
</div>

<!-- END CREATE SETTINGS -->
<br>

<!-- VIEW SETTINGS -->

{{-- <div class="card shadow-lg border-0 mb-5 bg-white rounded">
  <div class="card-header border-0 bg-info text-white font-weight-bold">
    ALL SETTINGS
  </div>
  <div class="card-body">
	<table class="table table-bordered table-condensed table-hover">
	  	<caption>List of users</caption>
	  	<thead>
		    <tr>
		       <th scope="col">#</th>
		       <th scope="col">FROM</th>
		       <th scope="col">TO</th>
		       <th scope="col">PRICE RANGE(KSH/L)</th>
		    </tr>
	  	</thead>
	  	<tbody>
	  		@forelse($setting as $setting)
		    <tr>
		       <th>{{ $setting->id }}</th>
		       <td>{{ $setting->from }}</td>
		       <td>{{ $setting->to }}</td>
		       <td>{{ $setting->price }}</td>
		    </tr>
		    @empty
		    <p class="text-muted">No Settings available. Create one.</p>
		    @endforelse
	  	</tbody>
	</table>
  </div>
</div> --}}

<!-- END VIEW SETTINGS -->

@stop