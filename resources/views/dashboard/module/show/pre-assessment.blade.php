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
    <ol>
        @forelse($questions as $question)
            <li class="mb-4">
                <p>
                    {{ $question->body }}
                </p>
                <ol type="a">
                    @foreach($question->options as $option)
                        <li @if($question->answer == $option) class="text-success" @endif>{{ $option }}</li>
                    @endforeach
                </ol>
            </li>
        @empty
            <div class="text-center py-5">
                <h4 class="text-muted">No Questions Yet</h4>
            </div>
        @endforelse
    </ol>
@endsection


