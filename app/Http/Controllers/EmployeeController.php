<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->paginate(1);
        return view('index',['employees'=>$employees]);
        //if we need to pass multiple variables
       // return view('index',compact('employees','anotherva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:employee,email|email',
            'joining_date'=>'required',
            'salary'=>'required|numeric',

        ],
        [
            'email:unique'=>'email already exists',
            'email:email'=>'incorrect format',
        ]
        );
        //for mass assignment
        $data = $request->except('_token');
        
        Employee::create($data);
        return redirect()->route('employee.index')->withMessage("Employee has been created successfully");

        //for inserting single row
        /*
        $employee = new Employee;
        $employee->name = $data['name'];
        $employee->email = $data['email'];
        $employee->salary = $data['salary'];
        $employee->joining_date = $data['joining_date'];
        $employee->is_active = $data['is_active'];
        $employee->save();*/
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        
        //if we use {id} in request use
        $employee = Employee::find($id);
       /* $request->validate([
            'name'=>'required|unique:employee,name,'.$employee->id.'|name',
            'email'=>'required|unique:employee,email,'.$employee->id.'|email',
            'joining_date'=>'required',
            'salary'=>'required|numeric',
        ],
        [
            'email:email'=>'incorrect format',
        ]
        );*/
        $data = $request->all();
       $employee->update($data);
        return redirect()->route('employee.edit',$employee->id)->withMessage("Employee has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee ->delete();
        return redirect()->route('employee.index')->withMessage("Employee has been removed");
    }
}
