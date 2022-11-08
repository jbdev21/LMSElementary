@extends('includes.layouts.dashboard')

@section('section-name', 'section')
@section('page-title', 'sections')

@section('content')
<div class="app-card shadow-sm mb-4">
    <div class="inner">
        <div class="app-card-body p-4">
            <a href="{{ route('dashboard.section.index') }}" class="btn btn-primary text-white mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Back
            </a>
            <div class="row">
                <div class="col-sm-4 p-4">
                    <h4>{{ $section->name }}</h1>
                   <form action="{{ route('dashboard.section.update', $section->id) }}" method="post">
                        @csrf @method('PUT')
                        <lable class="mt-2 text-muted">Update Section Form</lable>
                        <p class="mt-2">
                            Name
                            <input value="{{ $section->name }}" type="text" required name="name" spellcheck="true"
                                class="form-control">
                        </p>
                        <p>
                            <button class="btn text-white btn-primary" type="submit"><i class="fa fa-save"></i>
                                Save Changes</button>
                        </p>
                    </form>
                </div>
                <div class="col-sm-8 p-4">
                    <div class="row">
                        <div class="col-6">
                            <h4>Students</h4>
                             <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Date Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($section->students as $student)
                                            <tr>
                                                <td>{{ $student->full_name }}</td>
                                                <td>{{ $student->address }}</td>
                                                <td>{{ $student->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
