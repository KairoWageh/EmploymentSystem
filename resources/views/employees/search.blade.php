@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #9abbed;font-size: 20px; font-weight: bold">Employee Search</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Image</th>
                            <th>Job</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $employee)
                              <tr>
                                <td>{{$employee->firstName}}</td>
                                <td>{{$employee->lastName}}</td>
                                <td><img src="{{Storage::disk('local')->url($employee->image)}}" style="height:100px; width:100px"></td>
                                <td>{{$employee->job}}</td>
                                <td>{{$employee->status}}</td>
                                <td>
                                    @if("$employee->status" == "Not Active")
                                        <a href="/employees/activiate/{{$employee->employeeId}}" class="btn btn-default">Activiate</a>
                                        
                                    @endif
                                    <a href="/employees/edit/{{$employee->employeeId}}" class="btn btn-success">Edit</a>
                                    <a href="/employees/delete/{{$employee->employeeId}}" class="btn btn-danger">Delete</a>
                                </td>
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
