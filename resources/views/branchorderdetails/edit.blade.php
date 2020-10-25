@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Update Branch</h4>
                </div>
                <div class="card-body">
                    <form action="/branches/{{ $branch->id }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch Name</label></h5>
                                <input value="{{ $branch->branch_name }}" type="text" name="branch_name" class="form-control"
                                    placeholder="Branch Name">
                                @error('branch_name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch Max Capicaty</label></h5>
                                <input value="{{ $branch->branch_max_capicaty }}" type="number" name="branch_max_capicaty"
                                    class="form-control" placeholder="Branch Max Capicaty">
                                @error('branch_max_capicaty')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md form-group">
                                    <h5><label class="badge badge-dark" for="">Branch Opens</label></h5>
                                    <input value="{{ $branch->branch_opens }}" type="time" name="branch_opens"
                                        class="form-control" placeholder="Branch Opens">
                                    @error('branch_opens')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md form-group">
                                    <h5><label class="badge badge-dark" for="">Branch Closes</label></h5>
                                    <input value="{{ $branch->branch_closes }}" type="time" name="branch_closes"
                                        class="form-control" placeholder="Branch Closes">
                                    @error('branch_closes')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">

                                <h5><label class="badge badge-dark" for="">Branch Location</label></h5>
                                <textarea name="branch_location" placeholder="Branch Location" cols="20"
                                    class="form-control" rows="3">{{ $branch->branch_location }}</textarea>
                                @error('branch_location')
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
