<?php

namespace App\Http\Controllers;

use App\Models\BranchSection;
use Illuminate\Http\Request;

class BranchSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($brnch)
    {
        $branchsections = BranchSection::all();
        $branchsections->find($brnch);
        return view("branchsections.index")->with(compact("branchsections"))->with("brnch",$brnch);
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
    public function store(Request $request , $brnch)
    {

        $request->validate([
            "branch_section_name" => "required",
            "branch_section_max_capicaty" => "required",
            "branch_section_in_stock" => "required",
        ]);

        $branchsection = new BranchSection();
        $branchsection->branch_section_name = $request->branch_section_name;
        $branchsection->branch_section_max_capicaty = $request->branch_section_max_capicaty;
        $branchsection->branch_section_in_stock = $request->branch_section_in_stock;
        $branchsection->branch_id = $request->branch_id;
        $branchsection->save();

        return redirect()->route("branchsections.index",$brnch)->with("msg","Created")->with("type","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchSection  $branchSection
     * @return \Illuminate\Http\Response
     */
    public function show(BranchSection $branchSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchSection  $branchSection
     * @return \Illuminate\Http\Response
     */
    public function edit($brnch,BranchSection $branchSection)
    {
        return view("branchsections.edit")->with(compact("branchSection"))->with("brnch",$brnch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchSection  $branchSection
     * @return \Illuminate\Http\Response
     */
    public function update($brnch,Request $request, BranchSection $branchSection)
    {

        $request->validate([
            "branch_section_name" => "required",
            "branch_section_max_capicaty" => "required",
            "branch_section_in_stock" => "required",
        ]);

        $branchSection->branch_section_name = $request->branch_section_name;
        $branchSection->branch_section_max_capicaty = $request->branch_section_max_capicaty;
        $branchSection->branch_section_in_stock = $request->branch_section_in_stock;
        $branchSection->branch_id = $request->branch_id;
        $branchSection->save();

        return redirect()->route("branchsections.index",$brnch)->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchSection  $branchSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($brnch,BranchSection $branchSection)
    {
        $branchSection->delete();
        return redirect()->route("branchsections.index",$brnch)->with("msg","Deleted")->with("type","danger");
    }
}
