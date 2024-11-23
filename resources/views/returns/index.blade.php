@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Books Currently on Loan</h1>

    @if ($loans->isEmpty())
        <p>No books are currently borrowed.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Quantity Borrowed</th>
                    <th>Loan Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->quantity }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->due_date }}</td>
                        <td>{{ ucfirst($loan->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
