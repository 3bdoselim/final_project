@extends('layouts.admin')
@section('content')
    <style>
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
                    <h4>Create New Customer</h4>
                </div>
                <div class="card-body">
                    <form action="/customers" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Customer Name</label>
                                </div>
                                <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                    placeholder="Customer Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Customer Mobile</label>
                                </div>
                                <input value="{{ old('customer_mobile') }}" type="text" name="customer_mobile" class="form-control"
                                    placeholder="Customer Mobile">
                                @error('customer_mobile')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col form-group">

                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Customer Address</label>
                                </div>
                                {{-- <input value="{{ old('address') }}" type="number"
                                    name="address" class="form-control" placeholder="Customer Address">
                                --}}
                                <textarea name="address" placeholder="Customer Address" cols="20" class="form-control"
                                    rows="3">{{ old('address') }}</textarea>
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
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Customer Address</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->customer_mobile }}</td>
                                <td>{{ $customer->customer_address }}</td>
                                {{-- <td><a class="btn btn-sm btn-outline-success" href="/customerorders/{{$customer->id}}">Prev Purchases</a> --}}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="/customers/{{ $customer->id }}/edit">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/customers/{{ $customer->id }}">
                                        @csrf
                                        @method("delete")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
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
