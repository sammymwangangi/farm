@extends('layouts.master')
@section('content')

<div class="container-fluid">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="mt-4">Farmer Records </h1>
  <a class="btn btn-primary float-left mt-4 mb-3 ml-4 p-1" href="{{ url ('/farmers/create') }}"><i class="fas fa-plus"></i> Create Farmer</a>
  <div class="table-responsive">          
    <table id="users_table" class="table table-bordered table-striped table-auto table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>FARMER No.</th>
          <th>FARMER NAME.</th>
          <th>FARMER_ID</th>
          <th>FARMER LOCALITY</th>
          <th>FARMER PHONE</th>
          <th>FARMER ACCOUNT</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        @forelse($farmers as $i=> $farmer)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $farmer->no }}</td>
         <td>{{ $farmer->name }}</td>
         <td>{{ $farmer->nid }}</td>
         <td>{{ $farmer->locality }}</td>
         <td>{{ $farmer->phone }}</td>
         <td>{{ $farmer->acno }}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $farmer->id }}"><i class="fas fa-trash"></i></a>
             <a href="{{url('/farmers/edit/'.$farmer->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
        <div id="panel-modal-{{ $farmer->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                  <h5>Are you sure you want to delete this farmer?</h5>
                        </div>
                          <div class="modal-footer clearfix">
                <a href="{{ url('/farmers/destroy/'.$farmer->id) }}" class="btn btn-success float-sm-left">Okay</a>
                <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
              </div>
                    </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ====================End Delete Modal===========================  -->
        </tr>
          @empty
         <p>No data found</p>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="container align-content-center">
    <a class="btn btn-info" href="{{url('/print-farmers')}}">Print</a>
  </div>
</div>

@endsection
