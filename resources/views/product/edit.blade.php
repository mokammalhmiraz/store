@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('ADD Items') }}</div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('product/update') }}" enctype="multipart/form-data">

                            @csrf {{-- Token for cross check and secure from hacker --}}

                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option @if ($products->category_id == $category->id) selected @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Name</label>
                                <input placeholder="{{ $products->name }}" type="text" class="form-control"
                                    name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Price</label>
                                <input placeholder="{{ $products->price }}" type="text" class="form-control"
                                    name="price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input placeholder="{{ $products->quantity }}" type="text" class="form-control"
                                    name="quantity">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="id" value="{{ $products->id }}">

                            <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
