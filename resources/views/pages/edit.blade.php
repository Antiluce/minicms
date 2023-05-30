@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Page</h1>

        <form method="POST" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}" required>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required>{{ $page->content }}</textarea>
                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="current_image">Current Image</label>
                @if ($page->image)
                    <img src="{{ asset('storage/' . $page->image) }}" alt="Current Image" width="100" height="100">
                @else
                    No Image
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="submit" class="btn btn-primary">Update Page</button>
                <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>
@endsection
