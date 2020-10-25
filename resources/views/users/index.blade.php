@extends('layouts.admin')
@section('content')
<style>
    .badge{
        /* height: 10%; */
        font-size: 14px;
    }
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
<div class="container-fluid text-center col-md">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>User Name</th>
                <th>Employee</th>
                <th>Email Adress</th>
                <th>Role</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>&nbsp;</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->role == "super admin")
                        <span class="badge badge-success">
                            {{$user->role}}
                        </span>
                    @else
                        {{$user->role}}
                    @endif
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="/users/{{$user->id}}/edit">Edit</a>
                </td>
                <td>
                    <form method="POST" action="/users/{{$user->id}}">
                    @csrf
                    @method("delete")
                    <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @empty
                
            @endforelse

        </tbody>
    </table>    
</div>    
@endsection