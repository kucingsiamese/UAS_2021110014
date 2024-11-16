@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Book Returns</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel daftar pengembalian -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>User</th>
                <th>Book Title</th>
                <th>Loan Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($returns as $return)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $return->loan->user->name }}</td>
                    <td>{{ $return->loan->book->title }}</td>
                    <td>{{ $return->loan->loan_date->format('Y-m-d') }}</td>
                    <td>{{ $return->loan->due_date->format('Y-m-d') }}</td>
                    <td>{{ $return->return_date ? $return->return_date->format('Y-m-d') : 'Not Returned' }}</td>
                    <td>
                        @if($return->return_date)
                            <span class="badge bg-success">Returned</span>
                        @else
                            <span class="badge bg-danger">Not Returned</span>
                        @endif
                    </td>
                    <td>
                        @if(!$return->return_date)
                            <a href="{{ route('books.return', $return->loan->id) }}" class="btn btn-primary btn-sm">Return Book</a>
                        @else
                            <span class="text-muted">Completed</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No returns available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
