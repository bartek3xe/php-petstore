@extends('layouts.app')

@section('content')
    <h1>Edit Pet</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pets.update', $pet['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $pet['name'] ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->value }}" {{ old('status', $pet['status']) == $status->value ? 'selected' : '' }}>{{ ucfirst($status->value) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Pet</button>
    </form>
@endsection
