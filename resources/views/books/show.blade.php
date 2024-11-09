@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Category:</strong> {{ $book->category->name }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $book->location->location_name }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $book->quantity }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books List</a>
        </div>
    </div>
</div>
@endsection
