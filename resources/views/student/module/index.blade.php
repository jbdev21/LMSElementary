@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')

    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <h1 class="mb-3">Student Module</h1>
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
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
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
                                    <td>{{ ucfirst(optional($module->category)->name) }}</td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        {{ $module->created_at->format("M d, Y") }}
                                    </td>
                                    <td class="text-end">
                                        <a class="btn btn-primary text-white btn-sm py-1" href="{{ route('student.module.show', $module->id) }}"><i
                                                class="fa fa-eye"></i> More Details</a>
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
@endsection
