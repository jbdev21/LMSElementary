@extends('dashboard.module.includes.show-template')

@section('show-content')
    <div class="row">
        <div class="col-6">
            <h4>Lessons</h4>
        </div>
        
    </div>
    <div class="row">
        <div class="col-4">
            <div class="mb-3 p-3">
                <form action="{{ route('dashboard.lesson.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="module_id" value="{{ $module->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Minimum Score</label>
                            <input type="number" class="form-control" name="minimum_score">
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">File *</label>
                            <input type="file" required class="form-control" name="file">
                        </div> --}}
                    </div>
                    <button type="submit" class="btn btn-warning">Save</button>
                </form>
           </div>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Minimum Score</th>
                        <th>Files/Resources</th>
                        <th>Date Modified </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->name }} </td>
                            <td>
                                {{ $lesson->minimum_score }}
                                @if($lesson->alert)
                                    <small class="text-danger" title="Please add questions equal or more than {{ $lesson->minimum_score }}"><i class="fa fa-ban"></i></small>
                                @endif
                            </td>
                            <td>
                                <form  class="d-none" action="{{ route("dashboard.lesson.file.addfile", $lesson->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <input onchange="this.form.submit()" id="lesson-addfile-form-{{ $lesson->id }}" type="file" name="file">
                                </form>
                                <label class="btn btn-primary text-white btn-sm mb-2" for="lesson-addfile-form-{{ $lesson->id }}">Add File</label>
                                @foreach($lesson->media as $file)
                                    <div>
                                        <a download href="{{ $file->getUrl() }}">{{ $file->file_name }}</a>
                                        <form id="delete-file-form-{{ $file->id }}" class="d-none" action="{{ route("dashboard.lesson.file.deletefile", $file->id) }}" method="POST">
                                            @csrf @method("DELETE")
                                        </form>
                                        <label onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-file-form-{{ $file->id }}').submit() }" class="pr-2 text-danger btn pt-0 pl-0"><i class="fa fa-trash"></i></label>
                                    </div>
                                @endforeach
                            </td>
                            <td>{{ $lesson->created_at->format('M d, Y h:ia') }}</td>
                            <td class="text-end">
                                {{-- <a href="{{ route('dashboard.file.download', $lesson->id) }}" class="btn btn-primary text-white py-1">
                                    <i class="fa fa-download"></i>
                                </a> --}}
                                <a onclick="if(confirm('Are you sure to delete?')){ document.getElementById('lesson-{{ $lesson->id }}').submit(); }"
                                    href="#" class="btn btn-danger text-white py-1">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="lesson-{{ $lesson->id }}" action="{{ route('dashboard.lesson.destroy', $lesson->id) }}"
                                    method="POST">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Lessons Yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    
@endsection

