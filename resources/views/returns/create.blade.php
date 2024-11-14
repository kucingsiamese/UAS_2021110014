@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Return Book</h1>
    <form action="{{ route('books.return.store', $loan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="return_date">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
