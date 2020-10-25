@extends('layouts.admin')
@section('content')
                    <div class="col-md-4">
                        <div class="card text-white mb-3">
                            <div class="card-header bg-primary ">
                                <h4>Create New Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="row p-3 mb-2">
                                <form action="/products/{{$product->id}}" method="POST">
                                        @csrf
                                        @method("put")
                                        <div class="row form-group">
                                            <div class="col form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark">Name</label>
                                                </div>
                                                <input value="{{$product->product_name}}" type="text" name="name" class="form-control"
                                                    placeholder="Product Name">
                                                @error('name')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Brand</label>
                                                </div>
                                                <input value="{{$product->product_brand}}" type="text" name="brand" class="form-control"
                                                    placeholder="Product Brand">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark">Color</label>
                                                </div>
                                                <select name="color" class="form-control">
                                                    <option value=""></option>
                                                    @foreach (App\Models\Color::all() as $color)
                                                     @if ($color->id == $product->product_color)
                                                        <option value="{{$color->id}}" selected>{{$color->color_name}}</option>
                                                     @else
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                     @endif
                                                    @endforeach
                                                </select>
                                                @error('color')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Size</label>
                                                </div>
                                                <select name="size" class="form-control">
                                                    <option value=""></option>
                                                    @foreach (App\Models\Size::all() as $size)
                                                    @if ($size->id == $product->product_size)
                                                    <option value="{{$size->id}}" selected>{{$size->size_name}}</option>
                                                 @else
                                                     <option value="{{$size->id}}">{{$size->size_name}}</option>
                                                 @endif
                                                    @endforeach
                                                </select>
                                                @error('size')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Category</label>
                                                </div>
                                                <select name="category_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach (App\Models\Category::all() as $category)
                                                    @if ($category->id == $product->category_id)
                                                    <option value="{{$category->id}}" selected>{{ $category->category_name }}</option>
                                                 @else
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                 @endif
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Price</label>
                                                </div>
                                                <input value="{{$product->product_price}}" type="number" name="price" class="form-control"
                                                    placeholder="Product Price">
                                                @error('price')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
            
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6 form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Release Date</label>
                                                </div>
                                                <input value="{{$product->product_release_date}}" type="date" name="release_date"
                                                    class="form-control" placeholder="release Date">
                                                @error('release_date')
                                                <small class="badge badge-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">End Date</label>
                                                </div>
                                                <input value="{{$product->product_end_date}}" type="date" name="end_date" class="form-control"
                                                    placeholder="End Date">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md form-group">
                                                <div style="height: 25%">
                                                    <label class="badge badge-dark" for="">Offer</label>
                                                </div>
                                                <input value="{{$product->product_offer}}" type="number" name="offer" class="form-control"
                                                    placeholder="Offer">
                                            </div>
                                            <div class="col m-auto form-group">
                                                <input class="btn btn-success" type="submit" value="Save">
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection
