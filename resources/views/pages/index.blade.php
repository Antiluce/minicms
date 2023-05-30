@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pages <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm">Add New Page</a></h1>

        @if ($pages->isEmpty())
            <p>No entries found. <a href="{{ route('pages.create') }}">Add new page</a></p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody style="vertical-align: middle;">
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>
                            @if ($page->image)
                                <img src="{{ asset('storage/' . $page->image) }}" alt="Thumbnail" width="100" height="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
