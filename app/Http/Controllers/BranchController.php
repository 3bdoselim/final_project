<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(20);
        return view("branches.index")->with(compact("branches"));
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
            "branch_name" => "required",
            "branch_max_capicaty" => "required",
            "branch_opens" => "required",
            "branch_closes" => "required",
            "branch_location" => "required",
        ]);
        $branch = new Branch();
        $branch->branch_name = $request->branch_name;
        $branch->branch_max_capicaty = $request->branch_max_capicaty;
        $branch->branch_opens = $request->branch_opens;
        $branch->branch_closes = $request->branch_closes;
        $branch->branch_location = $request->branch_location;
        $branch->save();

        return redirect()->route("branches.index")->with("msg","Created")->with("type","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view("branches.edit")->with(compact("branch"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            "branch_name" => "required",
            "branch_max_capicaty" => "required",
            "branch_opens" => "required",
            "branch_closes" => "required",
            "branch_location" => "required",
        ]);

        $branch->branch_name = $request->branch_name;
        $branch->branch_max_capicaty = $request->branch_max_capicaty;
        $branch->branch_opens = $request->branch_opens;
        $branch->branch_closes = $request->branch_closes;
        $branch->branch_location = $request->branch_location;
        $branch->save();

        return redirect()->route("branches.index")->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route("branches.index")->with("msg","Deleted")->with("type","danger");
    }
}
