@extends('dashboard.module.includes.show-template')

@section('show-content')
    <div class="row">
        <div class="col-6">
            <h4>Assessment</h4>
        </div>
        
    </div>
    <div class="mb-3 p-3">
        <question-box 
            module="{{ $module->id }}"
            route="{{ route("dashboard.question.store") }}"
            token="{{ csrf_token() }}"
            type="pre"
        >
    </div>
    <hr>
    <div class="mb-3">
        <form>
            <input type="hidden" name="tab" value="assessment">
            <select name="lesson" onchange="this.form.submit()" style="width:350px" class="form-select">
                <option value="">- All Lessons -</option>
                @foreach($lessons as $lesson)
                <option @if(Request::get("lesson") == $lesson->id) selected @endif value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <ol>
        @forelse($questions as $question)
            <li class="mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-0">
                            {!! $question->body !!}
                        </p>
                        <ol type="a">
                            @foreach($question->options as $option)
                                <li @if($question->answer == $option) class="text-success" @endif>{!! $option !!}</li>
                            @endforeach
                        </ol>
                        <div class="p-3">
                            <form id="question-id-{{ $question->id }}" action="{{ route('dashboard.question.destroy', $question->id) }}" method="POST">
                                @csrf @method("DELETE")
                            </form>
                            <button onclick="if(confirm('Are you sure to delete?')){ document.getElementById('question-id-{{ $question->id }}').submit() }" class="btn btn-danger text-white">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
                
            </li>
        @empty
            <div class="text-center py-5">
                <h4 class="text-muted">No Questions Yet</h4>
            </div>
        @endforelse
    </ol>
@endsection

@push("scripts-header")
    <script src="https://cdn.tiny.cloud/1/3etjjswjc4u1mtvnr70q7p3ahavix9rhnp8puim5vad1kjt7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
@push("scripts")
<script>
    tinymce.init({
        selector: '#maineditor',
        menubar:false,
        statusbar: false,
        plugins: 'image',
        toolbar: 'image',
        images_upload_url: '{!! route('file.upload.tiny.mce') !!}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
    });
  </script>
@endpush


