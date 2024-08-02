@extends('layouts.app')

@section('content')
    <h1>Pets</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-success mb-3">Add New Pet</a>
    <ul class="list-group">
        @foreach($pets as $pet)
            <li class="list-group-item">
                @php
                    $name = array_key_exists('name', $pet) ? $pet['name'] : 'Unnamed';
                @endphp
                {{ $name }} ({{ $pet['status'] }})
                <div class="float-right">
                    <a href="{{ route('pets.show', $pet['id']) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('pets.edit', $pet['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pets.destroy', $pet['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
