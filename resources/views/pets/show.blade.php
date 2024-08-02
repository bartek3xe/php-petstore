@extends('layouts.app')

@section('content')
    <h1>Pet Details</h1>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <strong>Name:</strong>
                {{ array_key_exists('name', $pet) ? $pet['name'] : 'Unnamed' }}
            </p>
            <p class="card-text"><strong>Status:</strong> {{ $pet['status'] }}</p>
            <a href="{{ route('pets.index') }}" class="btn btn-secondary">Back to list</a>
        </div>
    </div>
@endsection
