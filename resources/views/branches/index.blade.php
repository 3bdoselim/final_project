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
                    <form action="/branches" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-md form-group">
                                    <label class="badge badge-dark" for="">Branch Name</label>
                                <input value="{{ old('branch_name') }}" type="text" name="branch_name" class="form-control"
                                    placeholder="Branch Name">
                                @error('branch_name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                    <label class="badge badge-dark" for="">Branch Max Capicaty</label>
                                <input value="{{ old('branch_max_capicaty') }}" type="number" name="branch_max_capicaty" class="form-control"
                                    placeholder="Branch Max Capicaty">
                                @error('branch_max_capicaty')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md form-group">
                                        <label class="badge badge-dark" for="">Branch Opens</label>
                                    <input value="{{ old('branch_opens') }}" type="time" name="branch_opens" class="form-control"
                                        placeholder="Branch Opens">
                                    @error('branch_opens')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md form-group">
                                        <label class="badge badge-dark" for="">Branch Closes</label>
                                    <input value="{{ old('branch_closes') }}" type="time" name="branch_closes" class="form-control"
                                        placeholder="Branch Closes">
                                    @error('branch_closes')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                    <label class="badge badge-dark" for="">Branch Location</label>
                                <textarea name="branch_location" placeholder="Branch Location" cols="20" class="form-control"
                                    rows="3">{{ old('branch_location') }}</textarea>
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
        <div class="col-md-8">

            <div class="table-responsive table-bordered">
                <table class="table text-center table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Branch Name</th>
                            <th>Branch Max Capicaty</th>
                            <th>Branch Opens</th>
                            <th>Branch Closes</th>
                            <th>Branch Location</th>
                            <th colspan="4">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="8">{{$branches->links()}}</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($branches as $branch)
                            <tr>
                                <td>{{ $branch->branch_name }}</td>
                                <td>{{ $branch->branch_max_capicaty }}</td>
                                <td>{{ $branch->branch_opens }}</td>
                                <td>{{ $branch->branch_closes }}</td>
                                <td>{{ $branch->branch_location }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-dark"
                                        href="/branchorders/{{ $branch->id }}">Orders</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="/branchsections/{{ $branch->id }}">Sections</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="/branches/{{ $branch->id }}/edit">Edit</a>
                                </td>
                                @if ( $branch->sections->count() == 0  )
                                <td>
                                    <form method="POST" action="/branches/{{ $branch->id }}">
                                        @csrf
                                        @method("delete")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                                @endif
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
