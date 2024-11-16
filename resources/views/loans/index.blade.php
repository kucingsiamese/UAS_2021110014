@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Loan Books</h2>
    <form method="POST" action="{{ url('/loans') }}">
        @csrf
        <div class="form-group">
            <label for="book">Select Book</label>
            <select class="form-control" name="book_id" id="book">
                @foreach ($loans as $loan)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Borrow Book</button>
    </form>
</div>
@endsection
