@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Menu List <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">Add New Menu</a></h1>
        @if ($menus->isEmpty())
            <p>No entries found. <a href="{{ route('menus.create') }}">Add new menu</a></p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Page</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody style="vertical-align: middle;">
                @foreach($menus as $menuItem)
                    <tr>
                        <td>{{ $menuItem->title }}</td>
                        <td>{{ $menuItem->page->title }}</td>
                        <td>
                            <a href="{{ route('menus.edit', $menuItem->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('menus.destroy', $menuItem->id) }}" method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
