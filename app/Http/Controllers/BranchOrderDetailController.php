<?php

namespace App\Http\Controllers;

use App\Models\BranchOrderDetail;
use Illuminate\Http\Request;

class BranchOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($brnch)
    {
        $branchorderdetails = BranchOrderDetail::paginate(20);
        $branchorderdetails->find($brnch);
        return view("branchorderdetails.index")->with(compact("branchorderdetails"))->with("brnch",$brnch);
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
            "product_count" => "required",
            "branch_order_id" => "required",
            "product_id" => "required",
        ]);

        $branchorderdetail = new BranchOrderDetail();
        $branchorderdetail->product_count = $request->product_count;
        $branchorderdetail->branch_order_id = $request->branch_order_id;
        $branchorderdetail->product_id = $request->product_id;
        $branchorderdetail->save();

        return redirect()->route("branchorderdetails.index",$brnch)->with("msg","Created")->with("type","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchOrderDetail  $branchOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOrderDetail $branchOrderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOrderDetail  $branchOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOrderDetail $branchOrderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchOrderDetail  $branchOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchOrderDetail $branchOrderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchOrderDetail  $branchOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOrderDetail $branchOrderDetail)
    {
        //
    }
}
