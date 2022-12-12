@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')

    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <h1 class="mb-3">Module Manager</h1>
                <form>
                    <div class="row mb-2">
                        <div class="col-3">
                            <div class="input-group mb-4">
                                <input name="q" type="text" class="form-control" value="{{ Request::get('q') }}"
                                    placeholder="Search for item..." name="q">
                                <button class="btn btn-primary text-white" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-3">
                            <select name="quarter" onchange="this.form.submit()" required class="form-select" required>
                                <option value=""> - all quarters -</option>
                                @foreach ($quarters as $quarter)
                                    <option @if(Request::get("quarter") == $quarter->id) selected @endif value="{{ $quarter->id }}">{{ ucfirst($quarter->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="category" onchange="this.form.submit()" required class="form-select" required>
                                <option value=""> - all categories -</option>
                                @foreach ($categories as $category)
                                    <option @if(Request::get("category") == $category->id) selected @endif value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-primary text-white btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                                New Module
                            </button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quarter</th>
                                <th>Students</th>
                                <th>Category</th>
                                <th>Files</th>
                                <th>Created </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($modules as $module)
                                <tr>
                                    <td width="25%">
                                        <a href="{{ route("dashboard.module.show", $module->id) }}">
                                            {{ $module->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ optional($module->quarter)->name }}
                                    </td>
                                    <td>
                                        {{ $module->users_count }}
                                    </td>
                                    <td>{{ ucfirst(optional($module->category)->name) }}</td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        {{ $module->created_at->format("M d, Y") }}
                                    </td>
                                    <td class="text-end">
                                        <a class="btn btn-primary text-white btn-sm py-1" href="{{ route('dashboard.module.show', $module->id) }}"><i
                                                class="fa fa-eye"></i> More Details</a>
                                        <a href="#"
                                            onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $module->id }}').submit() }"
                                            class="btn btn-danger text-white btn-sm py-1"><i class="fa fa-trash"></i> Delete</a>
                                        <form id="delete-{{ $module->id }}"
                                            action="{{ route('dashboard.module.destroy', $module->id) }}" method="POST">
                                            @csrf @method('DELETE')</form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No upload module found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $modules->appends([
                        'q' => request()->q,
                    ])->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.module.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Module Name *</label>
                            <input type="text" required class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quarter *</label>
                            <select name="quarter_id" required class="form-select" required>
                                <option value=""> -select quarter-</option>
                                @foreach ($quarters as $quarter)
                                    <option value="{{ $quarter->id }}">{{ ucfirst($quarter->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category *</label>
                            <select name="category_id" required class="form-select" required>
                                <option value=""> -select type-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Details</label>
                            <textarea name="details" class="form-control" rows="5"  style="min-height: 200px"></textarea>
                            <div id="emailHelp" class="form-text">This is optional, you can change it in the edit page.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">Save Module</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
