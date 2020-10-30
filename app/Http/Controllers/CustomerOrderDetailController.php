<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrderDetail;
use App\Models\CustomerOrder;
use Illuminate\Http\Request;

class CustomerOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerOrder $customerorder)
    {
        $customerorderdetails = CustomerOrderDetail::paginate(20);
        return view("customerorderdetails.index")->with(compact("customerorderdetails"))->with(compact("customerorder"));
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
    public function store(Request $request, CustomerOrder $customerorder)
    {

        $request->validate([
            "product_count" => "required",
            "customer_order_id" => "required",
            "product_id" => "required",
        ]);

        $customerorderdetail = new CustomerOrderDetail();
        $customerorderdetail->product_count = $request->product_count;
        $customerorderdetail->customer_order_id = $request->customer_order_id;
        $customerorderdetail->product_id = $request->product_id;
        $customerorderdetail->save();

        return redirect()->route("customerorderdetails.index", $customerorder)->with("msg","Created")->with("type","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerOrderDetail  $customerOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOrderDetail $customerOrderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerOrderDetail  $customerOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOrder $customerorder,CustomerOrderDetail $customerOrderDetail)
    {
        return view("customerorderdetails.edit")->with(compact("customerOrderDetail"))->with(compact("$customerorder"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerOrderDetail  $customerOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerOrder $customerorder, Request $request, CustomerOrderDetail $customerOrderDetail)
    {

        $request->validate([
            "product_count" => "required",
            "customer_order_id" => "required",
            "product_id" => "required",
        ]);

        $customerOrderDetail->product_count = $request->product_count;
        $customerOrderDetail->customer_order_id = $request->customer_order_id;
        $customerOrderDetail->product_id = $request->product_id;
        $customerOrderDetail->save();

        return redirect()->route("customerorderdetails.index",$customerorder)->with("msg","Updated")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customerOrderDetail  $customerOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOrder $customerorder,customerOrderDetail $customerOrderDetail)
    {
        $customerOrderDetail->delete();
        return redirect()->route("customerorderdetails.index", $customerorder)->with("msg","Deleted")->with("type","danger");
    }
}