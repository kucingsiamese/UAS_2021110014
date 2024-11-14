@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Book Locations</h1>

    <!-- Tombol utk nadd new location -->
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Add New Location</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel daftar lokasi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Location Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($locations as $location)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $location->location_name }}</td>
                    <td>
                        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this location?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No locations available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
