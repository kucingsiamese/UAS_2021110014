@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Return Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Book Title: {{ $return->loan->book->title }}</h5>
            <p class="card-text"><strong>User:</strong> {{ $return->loan->user->name }}</p>
            <p class="card-text"><strong>Loan Date:</strong> {{ $return->loan->loan_date->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $return->loan->due_date->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Return Date:</strong> {{ $return->return_date ? $return->return_date->format('Y-m-d') : 'Not Returned' }}</p>
            <a href="{{ route('returns.index') }}" class="btn btn-secondary">Back to Returns</a>
        </div>
    </div>
</div>
@endsection
