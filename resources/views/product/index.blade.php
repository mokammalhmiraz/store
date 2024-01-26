@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $categorys->links() }} --}}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
