@extends('layouts.master')
@section('content')
<!-- CREATE SETTINGS -->
<div class="container-fluid">
	<div class="card shadow-lg border-0 mb-5 bg-white rounded">
	    <div class="card-header border-0 bg-info text-white font-weight-bold">
		    Comments
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
	                    <form action="{{ url('dashboard/comments') }}" method="POST" enctype="multipart/form-data" novalidate="">
							@csrf
						  	<div class="form-group">
						    	<label for="title">Title</label>
						    	<input type="name" name="title" value="{{ $comment->title ?? ''}}" class="form-control" id="title" placeholder="Good services..">
						  	</div>
						  	<div class="form-group">
						    	<label for="body">Body</label>
						    	<textarea class="form-control" id="body" name="body" rows="3" placeholder="Your services are.." value="{{ $comment->body ?? ''}}"></textarea>
						  	</div>
						  	<div class="form-group">
						    	<label for="audio">Audio (optional)</label>
						    	<input type="file" name="audio" value="{{ $comment->audio ?? ''}}" class="form-control-file" id="audio" accept="audio/*">
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
          		@role('farmer')
		          <p class="card-text"><button class="btn btn-primary" data-toggle="modal" data-target="#heading2">
		            <i class="fas fa-plus"></i> Leave a Comment</button>
		          </p>
		          <hr>
		          <br>
		        @endrole
				@forelse($comments as $comment)
		        <div class="card shadow-lg border-0 mb-5 bg-white rounded" style="max-width: 540px;">
		        	<ul class="list-unstyled">
					  	<li class="media my-4">
						    <img class="rounded-circle ml-3 mr-3" src="{{asset('images/users/'.$comment->user->avatar)}}" alt="..." style="width: 2rem; height: 2rem">
						    <div class="media-body">
						      <h5 class="mt-0 mb-1">{{ $comment->title }}</h5>
						      {{ $comment->body }}
						     	<div>
							        <audio controls>
							    		<source src="{{asset('comments/'.$comment->audio)}}">
										Your browser does not support the audio element.
									</audio>
								</div>
						      <p class="card-text">
						      	<small class="text-muted"> {{date('d-M-y', strtotime($comment->created_at)) }}
						      	</small>
						      </p>
						    </div>
					  	</li>
					</ul>
		        </div>

			  	@empty
			    <p class="text-muted">No Comments Available!</p>
			    @endforelse
					
	  	</div>
	</div>	
</div>

@stop