@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Create New Location</h1>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Location Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Location</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
