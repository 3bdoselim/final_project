@extends('layouts.admin')
@section('content')
<div class="col">
    <div class="row">
        <div class="card text-white mb-3">
            <div class="card-header bg-primary ">
                <h4>Update Employee Informations</h4>
            </div>
            <div class="card-body">
                <div class="row p-3 mb-2">
                    <form action="/employees/{{$employee->id}}" method="POST">
                        @csrf
                        @method("put")
                        <div class="row form-group">
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark">Employee Name</label>
                                </div>
                                <input value="{{ $employee->employee_name }}" type="text" name="name" class="form-control"
                                    placeholder="Employee Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">National ID</label>
                                </div>
                                <input value="{{ $employee->employee_national_id }}" type="number" name="national_id" class="form-control"
                                    placeholder="National ID">
                                @error('national_id')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Mobile</label>
                                </div>
                                <input value="{{ $employee->employee_mobile }}" type="text" name="mobile" class="form-control"
                                    placeholder="Mobile">
                                @error('mobile')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Date of Birth</label>
                                </div>
                                <input value="{{ $employee->employee_dob }}" type="date" name="dob" class="form-control"
                                    placeholder="Date of Birth">
                                @error('dob')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark">Hire Date</label>
                                    </div>
                                    <input value="{{ $employee->employee_hire_date }}" type="date" name="hire_date" class="form-control"
                                        placeholder="Hire Date">
                                    @error('hire_date')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">Salary</label>
                                    </div>
                                    <input value="{{ $employee->employee_salary }}" type="number" name="salary" class="form-control"
                                        placeholder="Salary">
                                    @error('salary')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Commission</label>
                                </div>
                                <input value="{{ $employee->employee_commission }}" type="number" name="commission" class="form-control"
                                    placeholder="Commission">
                                @error('commission')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Manager</label>
                                </div>
                                {{-- <input value="{{ old('manager_id') }}" type="number" name="manager_id" class="form-control"
                                    placeholder="manager_id"> --}}
                                <select class="form-control" name="manager_id">
                                    <option value=""></option>
                                    @foreach (App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}} "
                                        @if ($emp->id  == $employee->manager_id )
                                            selected
                                        @endif    
                                        >{{$emp->employee_name}}</option>
                                    @endforeach
                                </select>
                                @error('manager_id')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark">Job</label>
                                </div>
                                {{-- <input value="{{ old('job_id') }}" type="number" name="job_id" class="form-control"
                                    placeholder="job_id"> --}}
                                <select class="form-control" name="job_id">
                                    <option value=""></option>
                                    @foreach (App\Models\Job::all() as $job)
                                        <option value="{{$job->id}}"
                                            @if ($job->id  == $employee->job_id )
                                                selected
                                            @endif   
                                        >{{$job->job_name}}</option>
                                    @endforeach
                                </select>
                                @error('job_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">Branch</label>
                                </div>
                                {{-- <input value="{{ old('branch_id') }}" type="number" name="branch_id" class="form-control"
                                    placeholder="branch_id"> --}}
                                <select class="form-control" name="branch_id">
                                    <option value=""></option>
                                    @foreach (App\Models\Branch::all() as $branch)
                                        <option value="{{$branch->id}}"
                                            @if ($branch->id  == $employee->branch_id )
                                                selected
                                            @endif      
                                        >{{$branch->branch_name}}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <div style="height: 25%">
                                    <label class="badge badge-dark" for="">User</label>
                                </div>
                                {{-- <input value="{{ old('user_id') }}" type="number" name="user_id" class="form-control"
                                    placeholder="user_id"> --}}
                                <select class="form-control" name="user_id">
                                    <option value=""></option>
                                    {{-- @foreach ($employees as $employee) --}}
                                        @foreach (App\Models\User::all() as $user)
                                        {{-- @if ($employee->users->get(0)->name != $user->name) --}}
                                            <option value="{{$user->id}}"
                                                @if ($user->id  == $employee->user_id )
                                                    selected
                                                @endif  
                                            >{{$user->name}}</option>
                                        {{-- @endif --}}
                                        @endforeach
                                    {{-- @endforeach --}}
                                </select>
                                @error('user_id')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col m-auto form-group">
                                <input class="btn btn-success" type="submit" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
