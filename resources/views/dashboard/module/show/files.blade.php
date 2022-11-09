@extends('dashboard.module.includes.show-template')

@section('show-content')
    <div class="row">
        <div class="col-6">
            <h4>Files</h4>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary text-white btn-lg" data-bs-toggle="modal"
                data-bs-target="#uploaderFormModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
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
                    <td>{{ ucfirst(basename($file->mime_type)) }}</td>
                    <td>{{ $file->human_readable_size }}</td>
                    <td>{{ $file->created_at }}</td>
                    <td class="text-end">
                        <a href="{{ route('dashboard.file.download', $file->id) }}" class="btn btn-primary text-white py-1">
                            <i class="fa fa-download"></i>
                        </a>
                        <a onclick="if(confirm('Are you sure to delete?')){ document.getElementById('file-{{ $file->id }}').submit(); }"
                            href="#" class="btn btn-danger text-white py-1">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form id="file-{{ $file->id }}" action="{{ route('dashboard.file.destroy', $file->id) }}"
                            method="POST">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Files Uploaded</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
@endsection

@section("modal-content ")
    <!-- Modal -->
    <div class="modal fade" id="uploaderFormModal" tabindex="-1" aria-labelledby="studentFormModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentFormModalLabel">Add File</h5>
                </div>
                <form action="{{ route('dashboard.file.upload.module.file', $module->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="module_id" value="{{ $module->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">File *</label>
                            <input type="file" required class="form-control" name="file">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                            <div class="form-text">This is optional, filename will be use if not provided
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
  