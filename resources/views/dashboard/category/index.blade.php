@extends('includes.layouts.dashboard')

@section('module-name', 'category')
@section('page-title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.category.store') }}" method="post">
                        @csrf
                        <p>
                            Name
                            <input value="{{ old('name') }}" type="text" required name="name" spellcheck="true"
                                class="form-control">
                        </p>
                        <div class="mb-4">
                            Type
                            <select name="type" required class="form-select">
                                <option value=""> -select type-</option>
                                @foreach (config('category.types') as $type)
                                    <option value="{{ $type }}" >{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
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
                                    {{ $categories->appends([
                                            'q' => request()->q,
                                        ])->links() }}
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>{{ ucfirst($category->type) }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary text-white btn-sm py-1" href="{{ route('dashboard.category.edit', $category->id) }}"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="#"
                                                onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $category->id }}').submit() }"
                                                class="btn btn-danger text-white btn-sm py-1"><i class="fa fa-trash"></i> Delete</a>
                                            <form id="delete-{{ $category->id }}"
                                                action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST">
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
