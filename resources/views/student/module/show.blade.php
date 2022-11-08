@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')
<div class="app-card shadow-sm mb-4">
    <div class="inner">
        <div class="app-card-body p-4">
            <a href="{{ route('student.module.index') }}" class="btn btn-primary text-white mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Back
            </a>
                <div class="row">
                    <div class="col-4 p-5">
                        <h4>{{ $module->name }}</h4>
                        <label class="form-label">Uploaded By: {{ optional($module->user)->full_name }}</label>
                        <label class="form-label">Date Uploaded: {{ $module->created_at->format('M d, Y') }}</label>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Category:</label>
                            <input type="text" class="form-control"
                                value="{{ $module->category->name }}" readonly>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="exampleInputEmail1" class="form-label">Description:</label>
                            <textarea class="form-control" rows="5" style="min-height: 200px" readonly>{{ $module->details }}</textarea>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4>Files</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Uploaded </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($files as $file)
                                    <tr>
                                        <td>{{ $file->file_name }}</td>
                                        <td>{{ $file->mime_type }}</td>
                                        <td>{{ $file->human_readable_size }}</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('student.file.download', $file->id) }}" class="btn btn-primary text-white py-1">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Files Uploaded</td>
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
