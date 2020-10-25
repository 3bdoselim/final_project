<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs =  Job::all();
        return view("jobs.index")->with(compact("jobs")); 
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
            "job_min_salary" => "required",
        ]); 

        $job = new Job();
        $job->job_name = $request->name;
        $job->job_min_salary = $request->job_min_salary;
        $job->job_description = $request->job_description;
        $job->save();
        return redirect()->route("jobs.index")->with("msg","Created")->with("type","success");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view("jobs.edit")->with(compact("job"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            "name" => "required|min:4",
            "job_min_salary" => "required",
        ]); 

        $job->job_name = $request->name;
        $job->job_min_salary = $request->job_min_salary;
        $job->job_description = $request->job_description;
        $job->save();
        return redirect()->route("jobs.index")->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route("jobs.index")->with("msg","Deleted")->with("type","danger");
    }
}