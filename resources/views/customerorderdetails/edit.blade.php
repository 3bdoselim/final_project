@extends('layouts.admin')
@section('content')
<div class="col-md-4">
    <div class="card text-white mb-3">
        <div class="card-header bg-primary ">
            <h4>Update Order Detail</h4>
        </div>
        <div class="card-body">
            <form action="/branchorders/{{ $branchOrderDetail->branch_order_id}}/branchorderdetails/{{ $branchOrderDetail->id}}" method="POST">
                @csrf
                @method("put")
                <div class="form-group">
                    <div class="col-md form-group">
                            <label class="badge badge-dark" for="">Order Date</label>
                            <select  class="form-control" name="branch_order_id">
                                <option value="{{ App\Models\BranchOrder::find($brnch)->id }}">
                                    {{ App\Models\BranchOrder::find($brnch)->branch_order_date }}
                                </option>
                            </select>
                        @error('branch_order_id')
                        <small class="badge badge-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md form-group">
                            <label class="badge badge-dark" for="">Product</label>
                            <select class="form-control" name="product_id"> 
                                <option value=""></option>
                                @foreach (  App\Models\Product::all() as $item)
                                    <option value="{{$item->id}}"
                                        @if ($branchOrderDetail->product_id == $item->id )
                                            selected
                                        @endif
                                    > ||
                                        {{ $item->product_name }} ||
                                        {{ $item->sizes->get(0)->size_name }} ||
                                        {{ $item->colors->get(0)->color_name }} ||
                                    </option>
                                @endforeach
                            </select>
                        @error('product_id')
                        <small class="badge badge-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>  
                <div class="form-group">
                    <div class="col-md form-group">
                            <label class="badge badge-dark" for="">Product Count</label>
                        <input class="form-control" value="{{$branchOrderDetail->product_count}}" type="number" name="product_count" placeholder="Product Count" >
                        @error('product_count')
                        <small class="badge badge-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col m-auto form-group">
                    <div><input class="btn btn-success" type="submit" value="Save"></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
