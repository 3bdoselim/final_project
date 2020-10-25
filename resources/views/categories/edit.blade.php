@extends('layouts.admin')
@section('content')
<style>
.alert {
    position: absolute;
    left: 50%;
    opacity:90%;
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white mb-3">
                <div class="card-header bg-primary ">
                    <h4>Update Category</h4>
                </div>
                <div class="card-body">
                    <form action="/categories/{{$category->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col form-group">
                                <h5><label class="badge badge-dark" for="">Category Name</label></h5>
                                <input value="{{$category->category_name}}" type="text" name="name" class="form-control" placeholder="Category Name">
                                @error('name')
                                <small class="badge badge-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md form-group">

                                <h5><label class="badge badge-dark" for="">Category Description</label></h5>
                                <textarea name="category_description" placeholder="Category Description" cols="20" class="form-control"
                                    rows="3">{{$category->category_description}}</textarea>
                            </div>
                        </div>
                        <div class="col m-auto form-group">
                            <div><input class="btn btn-success" type="submit" value="Save"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection