@extends('layouts.app')

@section('content')

<div class="container">
    <div style="margin-bottom: 100px">
       <a href="/employees/create" class="btn btn-primary" style="font-weight: bold"><i class="fa fa-plus" style="margin-right: 5px"></i>New Employee</a>

        <form action="employees/search" style="float:right" method="POST">
            {{ csrf_field() }}
          <input type="text" placeholder="Search.." name="search">
          <button type="submit" class="btn btn-primary">Find</button>
        </form> 
    </div>
    
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #9abbed;font-size: 20px; font-weight: bold">Employees</div>

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
                            @foreach($users as $id=>$user)

                            @endforeach
                            @foreach($employees as $id=>$employee)
                            
                              <tr>
                                <td>{{$employee->firstName}}</td>
                                <td>{{$employee->lastName}}</td>
                                <td><img src="{{Storage::disk('local')->url($employee->image)}}" style="height:100px; width:100px"></td>
                                <td>{{$employee->job}}</td>
                                <td>{{$employee->status}}</td>
                                <td>
                                    @if("$employee->status" == "Not Active")
                                        <a href="/employees/activiate/{{$employee->employeeId}}" class="btn btn-default">Activiate</a>
                                    @else
                                        <a href="/employees/deActiviate/{{$employee->employeeId}}" class="btn btn-warning">Deactiviate</a>
                                        
                                            @if("$user->isAdmin" == 0)
                                                <a href="/employees/setAdmin/{{$employee->employeeId}}" class="btn btn-default">Set Admin</a>
                                            @else
                                                <a href="/employees/setNotAdmin/{{$employee->employeeId}}" class="btn btn-default">Set Not Admin</a>
                                            @endif
                                        
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
</div>
@endsection
