@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Farmer') }}</div>

                <div class="card-body text-muted">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

					<form action="{{ url('/farmers/store') }}" method="POST">
					  @csrf

					  <div class="form-group row">
					  	<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Farmer Name') }}</label>
					  	<div class="col-md-6">
					  		<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" required data-validation-required-message= "Please enter farmer's name." required autofocus>

						    @if ($errors->has('name'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                        @endif
					  	</div>
					  </div>
					  <div class="form-group row">
					  	<label for="no" class="col-md-4 col-form-label text-md-right">{{ __('Farmer Number') }}</label>
					  	<div class="col-md-6">
					    	<input id="no" type="text" class="form-control{{ $errors->has('no') ? ' is-invalid' : '' }}" value="{{old('no')}}" name="no" required>

					    	@if ($errors->has('no'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('no') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group row">
					  	<label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('Farmer National ID') }}</label>
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
					  	<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Farmer Phone Number') }}</label>
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
					  	<label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Farmer Locality') }}</label>
					  	<div class="col-md-6">
					    	<input id="locality" type="text" class="form-control{{ $errors->has('locality') ? ' is-invalid' : '' }}" value="{{old('locality')}}" name="locality" required>

					    	@if ($errors->has('locality'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('locality') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group row">
					  	<label for="acno" class="col-md-4 col-form-label text-md-right">{{ __('Farmer Account Number') }}</label>
					  	<div class="col-md-6">
					    	<input id="acno" type="text" class="form-control{{ $errors->has('acno') ? ' is-invalid' : '' }}" value="{{old('acno')}}" name="acno" required>

					    	@if ($errors->has('acno'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('acno') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group row">
					  	<label for="method_of_payment" class="col-md-4 col-form-label text-md-right">{{ __('Method Of Payment') }}</label>
					  	<div class="col-md-6">
					    	<input id="method_of_payment" type="text" class="form-control{{ $errors->has('method_of_payment') ? ' is-invalid' : '' }}" value="{{old('method_of_payment')}}" name="method_of_payment" required>

					    	@if ($errors->has('method_of_payment'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('method_of_payment') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  
					  	<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-info btn-inline-info">
                                   <i class="fas fa-paper-plane"></i> {{ __('Submit') }}
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