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
                    <h4>Create New Branch Order</h4>
                </div>
                <div class="card-body">
                    <form action="/branchorders/{{ $brnch }}/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch</label></h5>

                                <select class="form-control" name="branch_id">
                                    <option value="{{ App\Models\Branch::find($brnch)->id }}">
                                        {{ App\Models\Branch::find($brnch)->branch_name }}
                                    </option>
                                </select>
                                @error('branch_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch Order Date</label></h5>
                                <input value="{{ old('branch_order_date') }}" type="date"
                                    name="branch_order_date" class="form-control"
                                    placeholder="Branch Order Date">
                                @error('branch_order_date')
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
                            <th>Branch Name</th>
                            <th>Branch Order Date</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branchorders as $branchorder)
                            @if ($branchorder->branch_id == App\Models\Branch::find($brnch)->id)
                                <tr>
                                    <td>{{ $branchorder->branch->branch_name}}</td>
                                    <td>{{ $branchorder->branch_order_date }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="/branchorderdetails/{{ $branchorder->id }}">Order Details</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="/branches/{{ $branchorder->branch_id }}/branchorders/{{ $branchorder->id }}/edit">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/branches/{{ $branchorder->branch_id }}/branchorders/{{ $branchorder->id }}">
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
