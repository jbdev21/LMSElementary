@extends('dashboard.module.includes.show-template')

@section('show-content')
    <div class="row">
        <div class="col-6">
            <h4>Students</h4>
        </div>
        <div class="col-6 text-end">
            {{-- <button type="button" class="btn btn-primary text-white btn-lg" data-bs-toggle="modal"
                data-bs-target="#studentFormModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-paperclip" viewBox="0 0 16 16">
                    <path
                        d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                </svg>
                Attached Student
            </button> --}}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Section</th>
                <th>Results</th>
                <th>Recent Take</th>
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
                    <td>
                        {{ $user->passedItems }} Passed / {{ $user->failedItems }} Failed
                    </td>
                    <td>{{ optional($user->last_taken_date)->format('M d, Y h:iA') }}</td>
                    <td class="text-end">
                        {{-- <button
                            onclick="if(confirm('Are you sure to detach {{ $user->first_name }}?')){ document.getElementById('user-{{ $user->id }}').submit(); }"
                            class="btn btn-danger text-white py-1">
                            <i class="fa fa-remove"></i> Remove
                        </button>
                        <form id="user-{{ $user->id }}" method="POST"
                            action="{{ route('dashboard.module.detach-user', $module->id) }}">
                            @csrf <input type="hidden" name="student" value="{{ $user->id }}">
                        </form> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No Student attached</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

{{-- @section('modal-content')
    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false" data-bs-focus="true" id="studentFormModal"
        tabindex="-1" aria-labelledby="studentFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentFormModalLabel">Attach Student</h5>
                </div>
                <div class="modal-body">
                    <module-student-selector-component module="{{ $module->id }}"></module-student-selector-component>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="window.location.reload()"
                        class="btn btn-primary text-white">Done</button>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
