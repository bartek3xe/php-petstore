@extends('layouts.app')

@section('content')
    <h1>Add New Pet</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>{{ ucfirst($status->value) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Pet</button>
    </form>
@endsection
