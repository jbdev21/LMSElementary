@extends('includes.layouts.dashboard')

@section('module-name', 'quarter')
@section('page-title', 'quarters')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Add quarter
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('dashboard.quarter.store') }}" method="post">
                        @csrf
                        <p>
                            Name
                            <input value="{{ old('name') }}" type="text" required name="name" spellcheck="true"
                                class="form-control">
                        </p>
                        <p>
                            Year
                            <input value="{{ old('year') }}" type="text" required name="year" spellcheck="true"
                                class="form-control">
                        </p>
                        <p>
                            <button class="btn text-white btn-primary" type="submit"><i class="fa fa-save"></i>
                                Save</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="app-card shadow-sm mb-4">
                <div class="inner">
                    <div class="app-card-body p-4">
                        <form>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="input-group mb-4">
                                        <input name="q" type="text" class="form-control"
                                            value="{{ Request::get('q') }}" placeholder="Search for item..." name="q">
                                        <button class="btn btn-primary text-white" type="submit"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-8">
                                    {{ $quarters->appends([
                                            'q' => request()->q,
                                        ])->links() }}
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Date Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($quarters as $quarter)
                                    <tr>
                                        <td>
                                            {{ $quarter->name }}
                                        </td>
                                        <td>
                                            {{ $quarter->year }}
                                        </td>
                                        <td>{{ $quarter->created_at->format('M d, Y') }}</td>
                                        <td class="text-end">
                                            {{-- <a class="btn btn-primary text-white btn-sm py-1" href="{{ route('dashboard.quarter.show', $quarter->id) }}"><i
                                                    class="fa fa-eye"></i> Show</a> --}}
                                            <a class="btn btn-warning text-white btn-sm py-1" href="{{ route('dashboard.quarter.edit', $quarter->id) }}"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="#"
                                                onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $quarter->id }}').submit() }"
                                                class="btn btn-danger text-white btn-sm py-1"><i class="fa fa-trash"></i> Delete</a>
                                            <form id="delete-{{ $quarter->id }}"
                                                action="{{ route('dashboard.quarter.destroy', $quarter->id) }}" method="POST">
                                                @csrf @method('DELETE')</form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No tag found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
