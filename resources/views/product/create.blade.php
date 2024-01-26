@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('List Items') }}</div>

                <div class="card-body">
                    {{-- <div class="alert alert-success text-center">
                        <h3>Total Items: </h3>
                    </div> --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Category</th>
                                <th>Product Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} BDT</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        {{ App\Models\Category::find($product->category_id)->name }}
                                    </td>
                                    <td>{{ $product->created_at->format('d/m/y h:i:s A') }}
                                        <br>
                                        <span class="badge badge-success">{{ $product->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('product/delete') }}/{{ $product->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ url('edit') }}/{{ $product->id }}" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $categorys->links() }} --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('ADD Items') }}</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('product/insert') }}" enctype="multipart/form-data">

                        @csrf {{-- Token for cross check and secure from hacker --}}

                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                                <option value="">-Select One-</option>
                                @foreach ($categories as $category)
                                    <option {{ (old('category_id') == $category->id)? "selected":"" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" name="product_price">
                            @error('product_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="text" class="form-control" name="product_quantity">
                            @error('product_quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
