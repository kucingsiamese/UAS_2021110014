@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loan Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Book Title: {{ $loan->book->title }}</h5>
            <p class="card-text"><strong>User:</strong> {{ $loan->user->name }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $loan->quantity }}</p>
            <p class="card-text"><strong>Loan Date:</strong> {{ $loan->loan_date->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $loan->due_date->format('Y-m-d') }}</p>
            <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to Loans</a>
        </div>
    </div>
</div>
@endsection
