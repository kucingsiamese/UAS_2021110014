@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #d496fd; padding: 40px; border-radius: 8px;">
    <h1 class="mb-4">Edit Location</h1>

    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Location Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $location->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Location</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
