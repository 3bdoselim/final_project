@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="/users/create" method="POST">
                @csrf
                    <h3>Create New User</h3>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="User Name">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input value="{{old('email')}}" type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input value="{{old('password')}}" type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input value="{{old('confimpassword')}}" type="password" name="confimpassword" class="form-control" placeholder="Confirm Password">
                            @error('confimpassword')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" >
                                <option value="seller">seller</option>
                                <option value="admin">admin</option>
                                <option value="super admin">super admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-outline-primary" type="submit" value="Create User">
                        </div>
            </form>
        </div>
@endsection
