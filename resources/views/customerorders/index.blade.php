@extends('layouts.admin')
@section('content')
    <style>
        .alert {
            position: absolute;
            left: 65%;
            z-index: 1;
            opacity: 90%;
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
                    <h4>Create New customer Order</h4>
                </div>
                <div class="card-body">
                    <form action="/customerorders/{{ $branch->id }}/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch</label></h5>

                                <select class="form-control" name="branch_id">
                                    <option value="{{ $branch->id }}">
                                        {{ $branch->branch_name }}
                                    </option>
                                </select>
                                @error('branch_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Customer</label></h5>

                                <select class="form-control" name="customer_id">
                                    <option value=""></option>
                                    @foreach (App\Models\Customer::all() as $cust)
                                    <option value="{{ $cust->id }}">
                                        {{ $cust->customer_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">customer Order Date</label></h5>
                                <input value="{{ old('customer_order_date') }}" type="date"
                                    name="customer_order_date" class="form-control"
                                    placeholder="customer Order Date">
                                @error('customer_order_date')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col mt-3 form-group">
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
                            <th>customer Name</th>
                            <th>customer Order Date</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customerorders as $customerorder)
                            @if ($customerorder->branch_id == $branch->id)
                                <tr>
                                    <td>{{ $customerorder->customer->customer_name}}</td>
                                    <td>{{ $customerorder->customer_order_date }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="/customerorderdetails/{{ $customerorder->id }}">Order Details</a>
                                    </td>
                                    {{-- <td>
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="/customeres/{{ $customerorder->customer_id }}/customerorders/{{ $customerorder->id }}/edit">Edit</a>
                                    </td> --}}
                                    @if ( $customerorder->details->count() == 0 )

                                    <td>
                                    <form method="POST" action="/customerorders/{{$branch->id}}/customerorder/{{ $customerorder->id }}">
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                            </form>
                                    </td>
                                    @endif

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
