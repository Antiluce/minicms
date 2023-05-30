@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Add New Role</h1>

        <form method="POST" action="{{ route('roles.store') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Role Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" required>
                @error('slug')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Add Role</button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
