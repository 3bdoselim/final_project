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
                    <h4>Create New Branch Section</h4>
                </div>
                <div class="card-body">
                    <form action="/branchsections/{{ $brnch }}/create" method="POST">
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
                                <h5><label class="badge badge-dark" for="">Branch Section Name</label></h5>
                                {{-- <input value="{{ old('branch_section_name') }}" type="text" name="branch_section_name"
                                    class="form-control" placeholder="Branch Section Name"> --}}
                                <select class="form-control" name="branch_section_name">
                                    <option value=""></option>
                                    @foreach (App\Models\Section::all() as $sec)
                                    <option value="{{$sec->id}}">{{$sec->section_name}}</option>
                                    @endforeach
                                </select>
                                @error('branch_section_name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch Section Max Capicaty</label></h5>
                                <input value="{{ old('branch_section_max_capicaty') }}" type="number"
                                    name="branch_section_max_capicaty" class="form-control"
                                    placeholder="Branch Section Max Capicaty">
                                @error('branch_section_max_capicaty')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Branch Section in Stock</label></h5>
                                <input value="{{ old('branch_section_in_stock') }}" type="number"
                                    name="branch_section_in_stock" class="form-control"
                                    placeholder="Branch Section in Stock">
                                @error('branch_section_in_stock')
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
                            <th>Branch Section Name</th>
                            <th>Branch Section Max Capicaty</th>
                            <th>Branch Section in Stock</th>

                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branchsections as $branchsection)
                            @if ($branchsection->branch_id == App\Models\Branch::find($brnch)->id)
                                <tr>
                                    <td>{{ $branchsection->sections->get(0)->section_name}}</td>
                                    <td>{{ $branchsection->branch_section_max_capicaty }}</td>
                                    <td>{{ $branchsection->branch_section_in_stock }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="/branches/{{ $branchsection->branch_id }}/branchsections/{{ $branchsection->id }}/edit">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/branches/{{ $branchsection->branch_id }}/branchsections/{{ $branchsection->id }}">
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
