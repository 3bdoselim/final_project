<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Branch;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $branch)
    {
        $customerorders = CustomerOrder::all();
        return view("customerorders.index")->with(compact("customerorders"))->with(compact("branch"));
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
    public function store(Request $request, Branch $branch)
    {

        $request->validate([
            "customer_id" => "required",
            "branch_id" => "required",
            "customer_order_date" => "required",
        ]);

        $customerorder = new CustomerOrder();
        $customerorder->customer_order_date = $request->customer_order_date;
        $customerorder->customer_id = $request->customer_id;
        $customerorder->branch_id = $request->branch_id;
        $customerorder->save();

        return redirect()->route("customerorders.index",$branch)->with("msg","Created")->with("type","success");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(customerOrder $customerOrder)
    {
        return view("customerorders.edit")->with(compact("customerOrder"))->with(compact("branch"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Branch $branch,Request $request, CustomerOrder $customerOrder)
    {

        $request->validate([
            "customer_id" => "required",
            "branch_id" => "required",
            "customer_order_date" => "required",
        ]);


        $customerOrder->customer_order_date = $request->customer_order_date;
        $customerorder->branch_id = $request->branch_id;
        $customerOrder->customer_id = $request->customer_id;
        $customerOrder->save();

        return redirect()->route("customerorders.index")->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch,CustomerOrder $customerOrder)
    {
        $customerOrder->delete();
        return redirect()->route("customerorders.index",$branch)->with("msg","Deleted")->with("type","danger");
    }
}
