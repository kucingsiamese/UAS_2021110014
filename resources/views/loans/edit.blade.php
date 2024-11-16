@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Loan</h1>

    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="book_id">Select Book</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Available: {{ $book->quantity }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Quantity to Borrow</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $loan->quantity }}" min="1" max="{{ $loan->book->quantity + $loan->quantity }}">
        </div>

        <div class="form-group mb-3">
            <label for="loan_date">Loan Date</label>
            <input type="date" name="loan_date" id="loan_date" class="form-control" value="{{ $loan->loan_date->format('Y-m-d') }}">
        </div>

        <div class="form-group mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $loan->due_date->format('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Loan</button>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
