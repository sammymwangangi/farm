@extends('layouts.master')
@section('content')

<div class="container-fluid">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <h1 class="mt-4">Employees Records </h1>
  <a class="btn btn-primary float-left mt-4 mb-3 ml-4 p-1" href="{{ route ('employee.create') }}"><i class="fas fa-plus"></i> Create Employee</a>
  <div class="table-responsive">          
    <table id="users_table" class="table table-bordered table-striped table-auto table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>EMPLOYEE NAME.</th>
          <th>EMPLOYEE_ID</th>
          <th>EMPLOYEE PHONE</th>
          <th>EMPLOYEE EMAIL</th>
          <th>EMPLOYEE PAYROLL NUMBER</th>
        </tr>
      </thead>
      <tbody>
        @forelse($employees as $i=> $employee)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $employee->name }}</td>
         <td>{{ $employee->nid }}</td>
         <td>{{ $employee->phone }}</td>
         <td>{{ $employee->email }}</td>
         <td>{{ $employee->payroll_no }}</td>
        </tr>
          @empty
         <p>No data found</p>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="container align-content-center">
    <a class="btn btn-info" href="{{url('employees/print-employees')}}">Print</a>
  </div>
</div>

@endsection
