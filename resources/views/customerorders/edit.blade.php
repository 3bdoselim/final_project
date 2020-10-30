@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Update Branch Section</h4>
                </div>
                <div class="card-body">
                    <form action="/branches/{{ $brnch }}/branchsections/{{ $branchSection->id }}" method="POST">
                        @csrf
                        @method("put")
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
                                <select class="form-control" name="branch_section_name">
                                    @foreach (App\Models\Section::all() as $sec)
                                    <option value="{{$sec->id}}" 
                                        @if ( $branchSection->branch_section_name== $sec->id)
                                            selected
                                        @endif
                                        >{{$sec->section_name}}</option>
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
                                <input value="{{ $branchSection->branch_section_max_capicaty }}" type="number"
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
                                <input value="{{ $branchSection->branch_section_in_stock }}" type="number"
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
    @endsection
