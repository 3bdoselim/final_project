@extends('layouts.admin')
@section('content')
    <style>
        .form-group {
            margin-bottom: .7em;
        }
        .alert {
            position: absolute;
            left: 65%;
            z-index: 1;
            opacity: 90%;
        }
        .badge {
            font-size: 1em;
        }
    </style>
    @if (session()->has('msg'))
        <div class="float-right alert alert-{{ session()->get('type') }} alert-dismissible col-4">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h5>Record {{ session()->get('msg') }} Successfully</h5>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Create New Branch</h4>
                </div>
                <div class="card-body">
                    <form action="/branchorderdetails/{{ $brnch }}/create" method="POST">
                        @csrf
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
                                            <option value="{{$item->id }}"> ||
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
                                    <input class="form-control" type="number" name="product_count" placeholder="Product Count" id="">
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
        <div class="col-md-8">

            <div class="table-responsive table-bordered">
                <table class="table text-center table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order Date</th>
                            <th>Product</th>
                            <th>Count </th>
                            <th>Color </th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="8">{{$branchorderdetails->links()}}</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($branchorderdetails as $branchorderdetail)
                        @if ($branchorderdetail->branch_order_id == App\Models\BranchOrder::find($brnch)->id)

                            <tr>
                                <td>{{ $branchorderdetail->branch_order->branch_order_date }}</td>
                                <td>
                                   || {{ $branchorderdetail->products->get(0)->product_name }} ||
                                    {{ $branchorderdetail->products->get(0)->sizes->get(0)->size_name }} ||
                                    {{ $branchorderdetail->products->get(0)->colors->get(0)->color_name  }} ||
                                </td>
                                <td>{{ $branchorderdetail->product_count }}</td>
                                <td>
                                    <div class="badge-pill" style="border: solid black 3px; height: 100%;width: 100% ;background-color: {{ $branchorderdetail->products->get(0)->colors->get(0)->color_description  }}">&nbsp;</div>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="/branchorderdetails/{{ $branchorderdetail->id }}/edit">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/branchorderdetails/{{ $branchorderdetail->id }}">
                                        @csrf
                                        @method("delete")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="8" class="alert-warning">
                                    <h3>No data Found</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                
            </div>
        </div>
    </div>
@endsection
