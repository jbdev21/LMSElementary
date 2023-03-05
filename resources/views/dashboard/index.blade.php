@extends('includes.layouts.dashboard')

@section('module-name', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <h1 class='mb-3'> WELCOME </h1>
    <div class="row">
        <div class="col-4">
            <div class="card rounded-0 border-0 bg-warning text-white">
                <div class="card-body text-center py-5">
                    <h1 class="text-white">{{ $studentsCount }}</h1>
                    <div>Students</div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card rounded-0 border-0 bg-danger text-white">
                <div class="card-body text-center py-5">
                    <h1 class="text-white">{{ $modulesCount }}</h1>
                    Modules Uploaded
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card rounded-0 border-0 bg-primary text-white">
                <div class="card-body text-center py-5">
                    <h1 class="text-white">{{ $examinationCounts }}</h1>
                    Assessment Taken
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="row">
            <div class="col-6">
                <h4>Recent Assesstments Taken</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route("dashboard.module.index") }}"> See All Modules <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Section</th>
                            <th>Results</th>
                            <th>Recent Take</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assessments as $assessment)
                            <tr>
                                <td>
                                    <a href="{{ route("dashboard.module.show", $assessment->module_id) }}">
                                        {{ $assessment->module->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route("dashboard.student.show", $assessment->user_id) }}">
                                    {{ $assessment->user->last_name }}
                                    </a>
                                </td>
                                <td>{{ $assessment->user->first_name }}</td>
                                <td>{{ $assessment->user->middle_name }}</td>
                                <td>{{ $assessment->user?->section->name }}</td>
                                <td>{{ $assessment->score }} / {{ $assessment->questions_count }}</td>
                                <td>{{ $assessment->created_at->format('M d, Y h:iA') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Student attached</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
