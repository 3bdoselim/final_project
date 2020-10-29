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
    <div class="row container-fluid">
        <div class="col-md-4">
            <div class="row">
                <div class="card text-white mb-3">
                    <div class="card-header bg-primary ">
                        <h4>Manage Image to Employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="row pl-3 pr-3">
                            <form action="/employee/images/{{$employee->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col form-group">
                                        <div style="height: 25%">
                                            <label class="badge badge-dark">Employee Data</label>
                                        </div>
                                            <h1 class="form-control">{{$employee->employee_name}}</h1>
                                            <h1 class="form-control">{{$employee->employee_national_id}}</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <div style="height: 25%">
                                            <label class="badge badge-dark" for="">Image</label>
                                        </div>
                                        <input value="{{ old('img') }}" type="file" name="img" class="form-control">
                                        @error('img')
                                            <small class="badge badge-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <div >
                                            <label class="badge badge-dark" for="">Profile</label>
                                        </div>
                                        <input value=1 type="checkbox" name="profile" >
                                        <b class="badge-warning badge-pill">Select as Profile Picture</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <div style="height: 25%">
                                            <label class="badge badge-dark" for="">description</label>
                                        </div>
                                        <input value="{{ old('description') }}" type="text" name="description" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3 form-group">
                                        <input class="btn btn-success" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                
                {{-- @foreach ($employee->photos as $photo)
                    <img width="50%"  height="50%" src="{{asset('storage/'.$photo->photo_name)}}" alt="">
                @endforeach --}}
                @foreach ($employee->photos as $photo)
                <div class="card" style="width: 17rem;">
                    <div class="card-body">
                        
                        <img class="card-img-top" src="{{asset('storage/'.$photo->photo_name)}}">
                        @if ($photo->profile == null)
                            @if ($photo->description == null)
                            <h5 class="card-title badge badge-danger">There` No Description</h5> 
                            @else
                            <h5 class="card-title badge badge-success">Image Description</h5> 
                            @endif
                        @else
                            <h5 class="card-title badge badge-success">Profile Picture</h5> 
                        @endif
                      <p class="card-text">{{$photo->description}}</p>
                      <form action="/employee/images/remove/{{$photo->id}}" method="post">
                        @csrf
                        @method("delete")
                        <input class="btn btn-danger" type="submit" value="Delete">
                      </form>
                      
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection
