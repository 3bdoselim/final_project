<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers =  Customer::all();
        return view("customers.index")->with(compact("customers")); 
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
            "customer_mobile" => "required|unique:customers,customer_mobile",
        ]); 

        $cust = new Customer();
        $cust->customer_name = $request->name;
        $cust->customer_mobile = $request->customer_mobile;
        $cust->customer_address = $request->address;
        $cust->save();

        return redirect()->route("customers.index")->with("msg","Created")->with("type","success");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view("customers.edit")->with(compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            "name" => "required|min:4",
            "customer_mobile" => "required|unique:customers,customer_mobile,".$customer->id,
        ]); 


        $customer->customer_name = $request->name;
        $customer->customer_mobile = $request->customer_mobile;
        $customer->customer_address = $request->address;
        $customer->save();

        return redirect()->route("customers.index")->with("msg","Updated")->with("type","success");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route("customers.index")->with("msg","Deleted")->with("type","danger");
    }
}
