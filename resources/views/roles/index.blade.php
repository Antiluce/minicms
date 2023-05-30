@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role List <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Add New Role</a></h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody style="vertical-align: middle;">
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" @if($role->id == 1) disabled @endif>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
