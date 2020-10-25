@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Update Job</h4>
                </div>
                <div class="card-body">
                    <form action="/jobs/{{ $job->id }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <div class="col form-group">
                                <h5><label class="badge badge-dark" for="">Job Name</label></h5>
                                <input value="{{ $job->job_name }}" type="text" name="name" class="form-control"
                                    placeholder="Customer Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">
                                <h5><label class="badge badge-dark" for="">Job Min Salary</label></h5>
                                <input value="{{ $job->job_min_salary }}" type="number" name="job_min_salary" class="form-control"
                                    placeholder="Job Min Salary">
                                @error('job_min_salary')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md form-group">

                                <h5><label class="badge badge-dark" for="">Job Description</label></h5>
                                {{-- <input value="{{ old('address') }}" type="number"
                                    name="address" class="form-control" placeholder="Customer Address">
                                --}}
                                <textarea name="job_description" placeholder="Job Description" cols="20" class="form-control"
                                    rows="3">{{ $job->job_description }}</textarea>
                            </div>
                        </div>
                        <div class="col m-auto form-group">
                            <div><input class="btn btn-success" type="submit" value="Update Record"></div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
