<?php

namespace App\Http\Controllers;

use App;
use Auth;
use DB;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
    	$employees = Employee::all();
    	$users = App\User::all();
    	return view('home',compact('employees','users'));
    }
    public function create(){
    	return view('employees.create');
    }
    public function store(Request $request){
        $image = "";
        if($request->hasFile('image')){
            $image = $request->image->store('public');
        }
        $this->validate(request(),
            [
                'firstName'=>'required|min:2',
                'lastName'=>'required|min:2',
                'image'=>'required',
                'job'=>'required|min:2'
         ]);

    	$newEmployee = new Employee;
    	$newEmployee->firstName = request('firstName');
    	$newEmployee->lastName = request('lastName');
        $newEmployee->image = $image;
        $newEmployee->job = request('job');
        $newEmployee->userId = Auth::user()->id;
        $newEmployee->status = "Not Active";
        $newEmployee->long = 0;
        $newEmployee->lat = 0;
    	$newEmployee->save();

    	$newUser = new User;
    	$newUser->id = $newEmployee->employeeId + 1;
    	$newUser->name = request('firstName')." ". request('lastName');
    	$newUser->password = bcrypt(request('password'));
    	$newUser->save();
    	return redirect('employees');
    }

    public function activiate($employeeId){
    	$employee = Employee::find($employeeId);
    	$employee->status = "Active";
    	$employee->save();
    	return redirect('employees');
    }

    public function deActiviate($employeeId){
    	$employee = Employee::find($employeeId);
    	$employee->status = "Not Active";
    	$employee->save();
    	return redirect('employees');
    }
    
    public function setAdmin($employeeId){
    	$user = User::find($employeeId+1);
    	$user->isAdmin = 1;
    	$user->save();
    	return redirect('employees');
    }

    public function setNotAdmin($employeeId){
    	$user = User::find($employeeId+1);
    	$user->isAdmin = 0;
    	$user->save();
    	return redirect('employees');
    }

    public function edit($employeeId){
    	$employee = Employee::find($employeeId);
    	return view('employees.edit',compact("employee"));
    }

    public function update($employeeId){
        $this->validate(request(),
            [
                'firstName'=>'required|min:2',
                'lastName'=>'required|min:2',
                'job'=>'required'
         ]);
    	$employee = App\Employee::find($employeeId);
    	$post->save();
    	return redirect('employees');
    }
    public function destroy($employeeId){
    	$employee = Employee::find($employeeId);
    	$employee->delete();
    	return redirect('employees');
    }

    public function search(){
    	$employee = Employee::where('firstName', request('search'))->get();
    	return view('employees.search', ['employee'=>$employee]);

	}
}
