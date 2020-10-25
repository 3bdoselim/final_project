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
                    <h4>Create New Product</h4>
                </div>
                <div class="card-body">
                    <div class="row p-3 mb-2">
                        <form action="/products" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark">Name</label>
                                    </div>
                                    <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                        placeholder="Product Name">
                                    @error('name')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">Brand</label>
                                    </div>
                                    <input value="{{ old('brand') }}" type="text" name="brand" class="form-control"
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
                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
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
                                        <option value="{{$size->id}}">{{$size->size_name}}</option>
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
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                                    <input value="{{ old('price') }}" type="number" name="price" class="form-control"
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
                                    <input value="{{ old('release_date') }}" type="date" name="release_date"
                                        class="form-control" placeholder="release Date">
                                    @error('release_date')
                                    <small class="badge badge-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">End Date</label>
                                    </div>
                                    <input value="{{ old('end_date') }}" type="date" name="end_date" class="form-control"
                                        placeholder="End Date">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md form-group">
                                    <div style="height: 25%">
                                        <label class="badge badge-dark" for="">Offer</label>
                                    </div>
                                    <input value="{{ old('offer') }}" type="number" name="offer" class="form-control"
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
        <div class="col-md-8">

            <div class="table-responsive table-bordered">
                <table class="table text-center table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Color</th>
                            <th>Product Size</th>
                            <th>Product Price</th>
                            <th>Product Brand</th>
                            <th>Product Release Date</th>
                            <th>Product Offer</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <small class="badge-dark badge-pill badge">{{ $product->colors->get(0)->color_name }}</small>
                                    <div class="border-dark" style="width: 100%;height: 100%;background-color: {{ $product->colors->get(0)->color_description }}">
                                    &nbsp;</div>
                                </td>
                                <td>{{ $product->sizes->get(0)->size_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_brand }}</td>
                                <td>{{ $product->product_release_date }}</td>
                                <td>
                                    @if ($product->product_offer)
                                        <b class="badge-danger badge ">{{ $product->product_offer }}%</b>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary" href="/products/{{ $product->id }}/edit">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/products/{{ $product->id }}">
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
        {{$products->links()}}
    </div>
@endsection
