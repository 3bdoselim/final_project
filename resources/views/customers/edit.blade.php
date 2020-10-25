@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Update Customer</h4>
                </div>
                <div class="card-body">
                    <form action="/customers/{{ $customer->id }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <div class="col form-group">
                               
                                <h5><label class="badge badge-dark" for="">Customer Name</label></h5>
                                <input value="{{ $customer->customer_name }}" type="text" name="name" class="form-control"
                                    placeholder="Customer Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                                </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md form-group">
                               
                                <h5><label class="badge badge-dark" for="">Customer Mobile</label></h5>
                                <input value="{{ $customer->customer_mobile }}" type="text" name="customer_mobile"
                                    class="form-control" placeholder="Customer Mobile">
                                @error('customer_mobile')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                                </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                               

                                <h5><label class="badge badge-dark" for="">Customer Address</label></h5>
                                {{-- <input value="{{ old('address') }}" type="number"
                                    name="address" class="form-control" placeholder="Customer Address">
                                --}}
                                <textarea name="address" placeholder="Customer Address" cols="20" class="form-control"
                                    rows="3">{{ $customer->customer_address }}</textarea>
                                </div>
                        </div>
                        <div class="col m-auto form-group">
                            <div><input class="btn btn-success" type="submit" value="Save"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
