@extends('includes.layouts.dashboard')

@section('user-name', 'user')
@section('page-title', 'users')

@section('content')
    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <form>
                    <div class="row mb-2">
                        <div class="col-3">
                            <div class="input-group mb-4">
                                <input name="q" type="text" class="form-control"
                                    value="{{ Request::get('q') }}" placeholder="Search for item..." name="q">
                                <button class="btn btn-primary text-white" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-9 text-end">
                            <a href="{{ route('dashboard.user.create') }}" class="btn btn-sm btn-primary pull-right text-white"><i class="fa fa-plus"></i> Add New user</a>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Date Registered</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->thumbnailUrl() }}"/>
                                </td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->contact_number }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="text-end">
                                    <a class="btn btn-warning btn-sm text-white" href="{{ route('dashboard.user.edit', $user->id) }}"><i
                                            class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a href="#"
                                        onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $user->id }}').submit() }"
                                        class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i> Delete
                                    </a>
                                    <form id="delete-{{ $user->id }}"
                                        action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST">
                                        @csrf @method('DELETE')</form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No user found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->appends([
                    'q' => request()->q,
                ])->links() }}
            </div>
        </div>
    </div>
@endsection
