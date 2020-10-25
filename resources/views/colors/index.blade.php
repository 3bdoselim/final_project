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
                    <h4>Create New color</h4>
                </div>
                <div class="card-body">
                    <form action="/colors" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col form-group">
                                <h5><label class="badge badge-dark" for="">color Name</label></h5>
                                <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                    placeholder="color Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">color Description</label></h5>
                                <input type="color" name="description" class="form-control" value="{{ old('color_description') }}">
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
                            <th>color Name</th>
                            <th>color Description</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($colors as $color)
                            <tr>
                                <td>{{ $color->color_name }}</td>
                                <td style="width:20%">
                                    <div  style="height: 100%;width: 100%;background-color: {{ $color->color_description }}">
                                        &nbsp;
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary" href="/colors/{{ $color->id }}/edit">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/colors/{{ $color->id }}">
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
