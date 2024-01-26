@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category List') }}</div>

                <div class="card-body">
                    <div class="alert alert-success text-center">
                        <h3>Total Categorys: </h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>UPDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->format('d/m/y h:i:s A') }}
                                        <br>
                                        <span class="badge badge-success">{{ $category->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $categorys->links() }} --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('ADD Category') }}</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('category/insert') }}">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
