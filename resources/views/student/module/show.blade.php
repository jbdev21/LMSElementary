@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')
    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <a href="{{ route('dashboard.module.index') }}" class="btn btn-primary text-white mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    Back
                </a>
                <h3>{{ $module->name }}</h1>
                    <div class="row">
                        <div class="col-sm-4 p-5">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Module Name *</label>
                                <input type="text" required class="form-control" name="name"
                                    value="{{ $module->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category *</label>
                                <select name="category_id" required class="form-select" required>
                                    <option value=""> -select type-</option>
                                    @foreach ($categories as $category)
                                        <option @if ($module->category_id == $category->id) selected @endif
                                            value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Details</label>
                                <textarea name="details" class="form-control" rows="5" style="min-height: 200px">{{ $module->details }}</textarea>
                                <div id="emailHelp" class="form-text">This is optional, you can change it in the edit page.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary text-white">Update Module</button>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-6">
                                    <h4>Students</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-primary text-white btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#studentFormModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                            <path
                                                d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                                        </svg>
                                        Attached Student
                                    </button>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Section</th>
                                        <th>Date/Time Added </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->middle_name }}</td>
                                            <td>{{ optional($user->section)->name }}</td>
                                            <td>{{ $user->pivot->created_at }}</td>
                                            <td></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Student attached</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-5">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4>Files</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-primary text-white btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#uploaderFormModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                            <path
                                                d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                        </svg>
                                        Upload File
                                    </button>
                                </div>
                            </div>
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
                                                <a href="#" class="btn btn-primary text-white py-1">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger text-white py-1">
                                                    <i class="fa fa-trash"></i>
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

    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false" data-bs-focus="true" id="studentFormModal" tabindex="-1" aria-labelledby="studentFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentFormModalLabel">Attach Student</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <module-student-selector-component></module-student-selector-component>
                    {{-- <input type="search" placeholder="search student.." x-model="search" class="form-control">
                    <input type="text" x-model="message"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="window.location.reload()" class="btn btn-primary text-white">Done</button>
                </div>
            </div>
        </div>
    </div>

@endsection
