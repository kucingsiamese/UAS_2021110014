@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 100px; border-radius: 100px;">
    <h1 class="mb-4">Loan Books</h1>
    <form form action="{{ route('loans.store') }}" method="POST" action="{{ url('/loans') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="book_id">Select Book</label>
                    <select name="book_id" id="book_id" class="form-select" size="1" style="height: auto;">
                        <option value="" disabled selected>Select a book</option>
                        <option value="1">Harry Potter</option>
                        <option value="2">Brief History of Time</option>
                        <option value="3">Clean Code</option>
                        <option value="4">Sapiens: A Brief History of Humankind</option>
                        <option value="5">Steve Jobs Biography</option>
                        <option value="6">Dune</option>
                        <option value="7">Pride and Prejudice</option>
                        <option value="8">Sherlock Holmes: The Hound of the Baskervilles</option>
                        <option value="9">The Shining</option>
                        <option value="10">The Hobbit</option>
                        <option value="11">Atonement</option>
                        <option value="12">1984</option>
                        <option value="13">Good Omens</option>
                        <option value="14">Fight Club</option>
                        @foreach($loans as $loans)
                            <option value="{{ $book->id }}">{{ $book->title }} (Available: {{ $book->quantity }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="quantity">Quantity to Borrow</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="loan_date">Loan Date</label>
                    <input type="date" name="loan_date" id="loan_date" class="form-control">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" name="due_date" id="due_date" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Borrow Book</button>
    </form>
</div>
@endsection
