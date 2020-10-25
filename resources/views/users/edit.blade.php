@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method("put")
                    <h3>Edit User</h3>
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control"
                            placeholder="User Name">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input value="{{ $user->email }}" type="email" name="email" class="form-control"
                            placeholder="Email">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control" name="role">
                            <option value="seller">seller</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            <option value="super admin">super admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-outline-success" type="submit" value="Update User">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
