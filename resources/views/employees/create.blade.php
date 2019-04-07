@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-white text-dark font-italic font-weight-bold">{{ __('Create New Employee') }}</div>
                @if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

                <div class="card-body text-muted">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<form action="{{ route('employee.store') }}" method="POST">
					  @csrf

					  <div class="form-group row">
					  	<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee Name') }}</label>
					  	<div class="col-md-6">
					  		<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" required data-validation-required-message= "Please enter Employee's name." required autofocus>

						    @if ($errors->has('name'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                        @endif
					  	</div>
					  </div>
					  <div class="form-group row">
					  	<label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('Employee National ID') }}</label>
					  	<div class="col-md-6">
					    	<input id="nid" type="text" class="form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}" value="{{old('nid')}}" name="nid" required>

					    	@if ($errors->has('nid'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('nid') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group row">
					  	<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Employee Phone Number') }}</label>
					  	<div class="col-md-6">
					    	<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{old('phone')}}" name="phone" required>

					    	@if ($errors->has('phone'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('phone') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
					  <div class="form-group row">
					  	<label for="payroll_no" class="col-md-4 col-form-label text-md-right">{{ __('Employee Account Number') }}</label>
					  	<div class="col-md-6">
					    	<input id="payroll_no" type="text" class="form-control{{ $errors->has('payroll_no') ? ' is-invalid' : '' }}" value="{{old('payroll_no')}}" name="payroll_no" required>

					    	@if ($errors->has('payroll_no'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('payroll_no') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  
					  	<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-success btn-inline-success">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
					</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection