@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
