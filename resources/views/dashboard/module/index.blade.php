@extends('includes.layouts.dashboard')

@section('module-name', 'module')
@section('page-title', 'modules')
=

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Add Modules
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.module.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <p>
                            Name
                            <input value="{{ old('name') }}" type="text" required name="name" spellcheck="true"
                                class="form-control" required>
                        </p>
                        <div class="mb-4">
                            Type
                            <select name="category_id" required class="form-select" required>
                                <option value=""> -select type-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" >{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            Files
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="file">
                            </div>
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
                                    {{ $modules->appends([
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
                                    <th>Files</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($modules as $module)
                                    <tr>
                                        <td>
                                            {{ $module->name }}
                                        </td>
                                        <td>{{ ucfirst($module->category->name) }}</td>
                                        <td>

                                        </td>
                                        <td class="text-end">
                                            <a class="btn-sm" href="{{ route('dashboard.module.edit', $module->id) }}"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#"
                                                onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $module->id }}').submit() }"
                                                class="text-danger"><i class="fa fa-trash"></i></a>
                                            <form id="delete-{{ $module->id }}"
                                                action="{{ route('dashboard.module.destroy', $module->id) }}" method="POST">
                                                @csrf @method('DELETE')</form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No upload module found</td>
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
