<?php

namespace App\Http\Controllers;

use App\Models\BranchOrder;
use Illuminate\Http\Request;

class BranchOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($brnch)
    {
        $branchorders = BranchOrder::all();
        $branchorders->find($brnch);
        return view("branchorders.index")->with(compact("branchorders"))->with("brnch",$brnch);
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
    public function store(Request $request, $brnch)
    {

        $request->validate([
            "branch_id" => "required",
            "branch_order_date" => "required",
        ]);

        $branchorder = new BranchOrder();
        $branchorder->branch_order_date = $request->branch_order_date;
        $branchorder->branch_id = $request->branch_id;
        $branchorder->save();

        return redirect()->route("branchorders.index",$brnch)->with("msg","Created")->with("type","success");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchOrder  $branchOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOrder $branchOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOrder  $branchOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOrder $branchOrder)
    {
        return view("branchorders.edit")->with(compact("branchOrder"))->with("brnch",$brnch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchOrder  $branchOrder
     * @return \Illuminate\Http\Response
     */
    public function update($brnch,Request $request, BranchOrder $branchOrder)
    {

        $request->validate([
            "branch_id" => "required",
            "branch_order_date" => "required",
        ]);


        $branchOrder->branch_order_date = $request->branch_order_date;
        $branchOrder->branch_id = $request->branch_id;
        $branchOrder->save();

        return redirect()->route("branchorders.index",$brnch)->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchOrder  $branchOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($brnch,BranchOrder $branchOrder)
    {
        $branchOrder->delete();
        return redirect()->route("branchorders.index",$brnch)->with("msg","Deleted")->with("type","danger");
    }
}
