@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Category Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category Name: {{ $category->name }}</h5>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>
</div>
@endsection
