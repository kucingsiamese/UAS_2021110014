@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h2>Books List</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    <table class="table table-bordered">
        @if ($books->isEmpty())
        <p>No books are available in the library</p>
    @else
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->location->location_name }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
