<?php

namespace App\Http\Controllers;

use App\Models\EmployeePhoto;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        // dd($employee);
        return view("employees.image")->with(compact("employee"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Employee $employee)
    {
        $request->validate([
            "img" => "required|image|max:2048",
        ]);

        $img = Storage::disk("public")->put("employees",$request->file("img"));
        $employeephoto = new EmployeePhoto();
        $employeephoto->photo_name = $img;
        // $employeephoto->employee_id = $request->employee_id;
        $employeephoto->employee_id = $employee->id;
        $employeephoto->description = $request->description;
        $employeephoto->profile = $request->profile;

        // dd($employeephoto);
        $employeephoto->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeePhoto  $employeePhoto
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePhoto $employeePhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeePhoto  $employeePhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePhoto $employeePhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePhoto  $employeePhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePhoto $employeePhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePhoto  $employeePhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePhoto $employeePhoto)
    {
        Storage::disk("public")->delete($employeePhoto->photo_name);
        $employeePhoto->delete();
        return redirect()->back();
    }
}
