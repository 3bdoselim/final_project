<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::paginate(10);
        return view("products.index")->with(compact("products"));        
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
            "price" => "required",
            "size" => "required",
            "color" => "required",
            "category_id" => "required",
            "release_date" => "required",
        ]); 

        $cat = new Product();
        $cat->product_name = $request->name;
        $cat->product_price = $request->price;
        $cat->product_size = $request->size;
        $cat->product_color = $request->color;
        $cat->product_offer = $request->offer;
        $cat->product_brand = $request->brand;
        $cat->product_release_date = $request->release_date;
        $cat->product_end_date = $request->end_date;
        $cat->category_id = $request->category_id;

        $cat->save();
        return redirect()->route("products.index")->with("msg","Created")->with("type","success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.edit")->with(compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required|min:4",
            "price" => "required",
            "size" => "required",
            "color" => "required",
            "category_id" => "required",
            "release_date" => "required",
        ]); 

        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_size = $request->size;
        $product->product_color = $request->color;
        $product->product_offer = $request->offer;
        $product->product_brand = $request->brand;
        $product->product_release_date = $request->release_date;
        $product->product_end_date = $request->end_date;
        $product->category_id = $request->category_id;

        $product->save();
        return redirect()->route("products.index")->with("msg","Updated")->with("type","success");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with("msg","Delted")->with("type","danger");
    }
}
