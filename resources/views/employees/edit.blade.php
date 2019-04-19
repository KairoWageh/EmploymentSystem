@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="/employees" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="firstName" value="{{$employee->firstName}}" />
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="lastName" value="{{$employee->lastName}}" />
                </div>
                <label for="image">Image:</label>
                <div class="form-group col-md-12">
                    <img src="{{Storage::disk('local')->url($employee->image)}}" style="height:100px; width:100px" />
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="job" value="{{$employee->job}}" />
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" class="form-control btn btn-primary" value="Edit" />
                </div>
            </form>
            <section id="bottomSection">
                <section id="googleMap">
                    
                </section>
            
                <section id="bottomSectionInfo">
                    <span>Latitude &#40;Degree&#41;</span>
                    <input type="text" id="Latitude"/>
                    <span>Longitude &#40;Degree&#41;</span>
                    <input type="text" id="Longitude"/>
                    <span>Accuracy &#40;m&#41;</span>
                    <input type="text" id="Accuracy"/>
                    <span>TimeStamp &#40;Current Time and Date&#41;</span>
                    <input type="text" id="TimeStamp"/>
                </section>
            </section>
            @if(count($errors))
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $key=>$error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
