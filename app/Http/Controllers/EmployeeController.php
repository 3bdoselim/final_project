<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(3);
        return view("employees.index")->with(compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "name" => "required|min:4",
            "national_id" => "required|min:14|max:14|unique:employees,employee_national_id",
            "mobile" => "required|min:11",
            "hire_date" => "required",
            "salary" => "required",
            "commission" => "required",
            "job_id" => "required",
            // "branch_id" => "required",
            "user_id" => "required|unique:employees,user_id",
        ]); 
    
        $employee = new Employee();
        $employee->employee_name = $request->name;
        $employee->employee_national_id = $request->national_id;
        $employee->employee_mobile = $request->mobile;
        $employee->employee_dob = $request->dob;
        $employee->employee_hire_date = $request->hire_date;
        $employee->employee_salary = $request->salary;
        $employee->employee_commission = $request->commission;
        $employee->manager_id = $request->manager_id;
        $employee->job_id = $request->job_id;
        $employee->branch_id = $request->branch_id;
        $employee->user_id = $request->user_id;
    
        $employee->save();
        return redirect()->route("employees.index")->with("msg","Created")->with("type","success");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view("employees.edit")->with(compact("employee"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
    
        $request->validate([
            "name" => "required|min:4",
            "national_id" => "required|min:14|max:14|unique:employees,employee_national_id,".$employee->id,
            "mobile" => "required|min:11",
            "hire_date" => "required",
            "salary" => "required",
            "commission" => "required",
            "job_id" => "required",
            "user_id" => "required|unique:employees,user_id,".$employee->id,
        ]); 
    
        $employee->employee_name = $request->name;
        $employee->employee_national_id = $request->national_id;
        $employee->employee_mobile = $request->mobile;
        $employee->employee_dob = $request->dob;
        $employee->employee_hire_date = $request->hire_date;
        $employee->employee_salary = $request->salary;
        $employee->employee_commission = $request->commission;
        $employee->manager_id = $request->manager_id;
        $employee->job_id = $request->job_id;
        $employee->branch_id = $request->branch_id;
        $employee->user_id = $request->user_id;
    
        $employee->save();
        return redirect()->route("employees.index")->with("msg","Updated")->with("type","success");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route("employees.index")->with("msg","Deleted")->with("type","danger");
    }
}
