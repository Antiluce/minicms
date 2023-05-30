@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Menu Item</h1>

        <form method="POST" action="{{ route('menus.update', $menu->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $menu->title }}" required>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="page_id">Page</label>
                <select name="page_id" id="page_id" class="form-control" required>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}" {{ $page->id === $menu->page_id ? 'selected' : '' }}>
                            {{ $page->title }}
                        </option>
                    @endforeach
                </select>
                @error('page_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="submit" class="btn btn-primary">Update Menu Item</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
