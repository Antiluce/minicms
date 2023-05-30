@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Last Pages Added</div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($lastPages as $page)
                                                <li>
                                                    <a href="{{ route('pages.edit', $page->id) }}">{{ $page->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Last Menu Items Added</div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($lastMenuItems as $menuItem)
                                                <li>
                                                    <a href="{{ route('menus.edit', $menuItem->id) }}">{{ $menuItem->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">User Created Links</div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($users as $user)
                                                <li>
                                                    <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
