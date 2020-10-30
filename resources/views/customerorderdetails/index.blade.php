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
                    <h4>Create New Order Details</h4>
                </div>
                <div class="card-body">
                    <form action="/customerorderdetails/{{ $customerorder->id }}/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-md form-group">
                                    <label class="badge badge-dark" for="">Order Date</label>
                                    <select  class="form-control" name="customer_order_id">
                                        <option value="{{ $customerorder->id }}">
                                            {{ $customerorder->customer_order_date }}
                                        </option>
                                    </select>
                                @error('customer_order_id')
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
                            <th>Price / item</th>
                            <th>Count </th>
                            <th>Color </th>
                            <th colspan="1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="7">{{$customerorderdetails->links()}}</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customerorderdetails as $customerorderdetail)
                        @if ($customerorderdetail->customer_order_id == $customerorder->id)

                            <tr>
                                <td>{{ $customerorder->customer_order_date }}</td>
                                <td>
                                   || {{ $customerorderdetail->products->get(0)->product_name }} ||
                                    {{ $customerorderdetail->products->get(0)->sizes->get(0)->size_name }} ||
                                    {{ $customerorderdetail->products->get(0)->colors->get(0)->color_name  }} ||
                                </td>
                                <td>{{ $customerorderdetail->products->get(0)->product_price }} $</td>
                                <td>{{ $customerorderdetail->product_count }}</td>
                                <td>
                                    <div class="badge-pill" style="border: solid black 3px; height: 100%;width: 100% ;background-color: {{ $customerorderdetail->products->get(0)->colors->get(0)->color_description  }}">&nbsp;</div>
                                </td>

                                <td>
                                    <form method="POST" action="/customerorderdetails/{{$customerorder->id}}/customerorderdetail/{{ $customerorderdetail->id }}">
                                        @csrf
                                        @method("delete")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                    @php
                    $x = 0;
                    @endphp

                    @foreach ($customerorderdetails as $customerorderdetail)
                        @if ($customerorderdetail->customer_order_id == $customerorder->id)
                            @php
                                $x += $customerorderdetail->products()->sum('product_price');
                            @endphp
                        @endif
                    @endforeach
                    
                    @if ($x != 0)
                    <tfoot class="card-header">
                        <tr>
                            <td colspan="2"><small class="badge badge-dark">Total</small></td>

                            <td><small class="badge badge-danger">{{$x}}</small></td>
                            @php
                                $y = 0;
                            @endphp

                            @foreach ($customerorderdetails as $customerorderdetail)
                                @if ($customerorderdetail->customer_order_id == $customerorder->id)
                                    @php
                                        $y += $customerorderdetail->product_count;
                                    @endphp
                                @endif
                            @endforeach
                            <td><small class="badge badge-danger">{{$y}}</small></td>
                            <td colspan="4">
                                <a class="btn btn-outline-dark" href="#" role="button">Print Invoice</a>
                            </td>
                        </tr>
                    </tfoot>
                    @else
                        <tfoot>
                            <tr>
                                <td colspan="7" class="alert-warning">
                                    <h3>No data Found</h3>
                                </td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
