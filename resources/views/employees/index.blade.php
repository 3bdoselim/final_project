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
            font-size: 0.9em;

        }

        hr{

            margin-top: 0em;
            margin-bottom: 0em;
        }
        .table th, .table td{
            padding: .4em;
        }
 
        ol, ul, dl{
            margin-top:0;
            margin-bottom:0;
        }
        tr{
            border-bottom: 2px solid rgb(222, 226, 230) ;
        }

    </style>
    @if (session()->has('msg'))
        <div class="float-right alert alert-{{ session()->get('type') }} alert-dismissible col-4">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h5>Record {{ session()->get('msg') }} Successfully</h5>
        </div>
    @endif
    <div class="col">
        <div class="row">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Create New employee</h4>
                </div>
                <div class="card-body">
                    <div class="row pl-3 pr-3">
                        <form action="/employees" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark">Employee Name</label>
                                    </div>
                                    <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                        placeholder="Employee Name">
                                    @error('name')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">National ID</label>
                                    </div>
                                    <input value="{{ old('national_id') }}" type="number" name="national_id" class="form-control"
                                        placeholder="National ID">
                                    @error('national_id')
                                        <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">Mobile</label>
                                    </div>
                                    <input value="{{ old('mobile') }}" type="text" name="mobile" class="form-control"
                                        placeholder="Mobile">
                                    @error('mobile')
                                        <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">Date of Birth</label>
                                    </div>
                                    <input value="{{ old('dob') }}" type="date" name="dob" class="form-control"
                                        placeholder="Date of Birth">
                                    @error('dob')
                                        <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                    <div class="col form-group">
                                        <div style="height: 25%">
                                            <label class="badge badge-dark">Hire Date</label>
                                        </div>
                                        <input value="{{ old('hire_date') }}" type="date" name="hire_date" class="form-control"
                                            placeholder="Hire Date">

                                            @error('hire_date')
                                          <small class="badge badge-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                    <div class="col form-group">
                                        <div style="height: 25%">
                                            <label class="badge badge-dark" for="">Salary</label>
                                        </div>
                                        <input value="{{ old('salary') }}" type="number" name="salary" class="form-control"
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
                                    <input value="{{ old('commission') }}" type="number" name="commission" class="form-control"
                                        placeholder="If Empty put 0">
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
                                        @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}" 
                                                @if ($employee->id == old('manager_id'))
                                                    selected
                                                @endif
                                                >{{$employee->employee_name}}</option>
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
                                                @if ($job->id == old('job_id'))
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
                                                @if ($branch->id == old('branch_id'))
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
                                                    @if ($user->id == old('user_id'))
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
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive table-bordered">
                <table class="table text-center table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>Profile</th>
                            <th>Name || National ID || Manager</th>
                            <th>Mobile Number</th>
                            <th>Date of Birth || Hire Date</th>
                            <th>Salary || Commission</th>
                            <th>Job</th>
                            <th>Branch</th>
                            <th>User</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)

                            <tr>
                                <td style="width:9em;">
                                    @if ($employee->photos()->where('profile',1)->first())
                                        <img class="img-thumbnail img-fluid" src="{{asset('storage/'.$employee->photos()->where('profile',1)->first()->photo_name)}}">
                                    @endif
                                </td>
                                <td>
                                    {{ $employee->employee_name }}
                                    <hr>{{ $employee->employee_national_id }}
                                    @if ($employee->managers)
                                         <hr><small class="badge-success badge badge-pill">M</small>{{  $employee->manager_id ? $employee->managers->first()->employee_name : "None" }}
                                    @endif
                                </td>
                                <td>{{ $employee->employee_mobile }}</td>
                                <td><small class="badge-info badge badge-pill">Birth date</small><small class="badge-danger badge">{{ $employee->employee_dob }}</small> 
                                    <hr> 
                                    <small class="badge-info badge badge-pill">Hire date</small><small class="badge-dark badge">{{ $employee->employee_hire_date }}</small> 
                                </td>
                                <td  style="width:9em;">{{ $employee->employee_salary }}<hr/>
                                    @if ($employee->employee_commission > 0 )
                                        <small class="badge-danger badge badge-pill">
                                            {{ $employee->employee_commission }}%
                                        </small>
                                    @endif
                                </td>
                                <td><small class="badge-primary badge">{{ $employee->jobs->get(0)->job_name }}</td>

                                <td>
                                    {{ $employee->branch_id ? $employee->branches->get(0)->branch_name : "Admin" }}
                                </td>
 
                                <td>{{ $employee->users->get(0)->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="/employee/images/{{ $employee->id }}/manage">Manage Photos</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/employees/{{ $employee->id }}/edit">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/employees/{{ $employee->id }}">
                                        @csrf
                                        @method("delete")
                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="alert-warning">
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
