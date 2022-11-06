@extends('includes.layouts.dashboard')

@section('student-name', 'student')
@section('page-title', 'students')
=

@section('content')
    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <form>
                    <div class="row mb-2">
                        <div class="col-4">
                            <div class="input-group mb-4">
                                <input name="q" type="text" class="form-control"
                                    value="{{ Request::get('q') }}" placeholder="Search for item..." name="q">
                                <button class="btn btn-primary text-white" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-8">
                            {{ $students->appends([
                                    'q' => request()->q,
                                ])->links() }}
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Category</th>
                            <th>Files</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>
                                    {{ $student->full_name }}
                                </td>
                                <td>

                                </td>
                                <td class="text-end">
                                    <a class="btn-sm" href="{{ route('dashboard.student.edit', $student->id) }}"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="#"
                                        onclick="if(confirm('Are you sure to delete?')){ document.getElementById('delete-{{ $student->id }}').submit() }"
                                        class="text-danger"><i class="fa fa-trash"></i></a>
                                    <form id="delete-{{ $student->id }}"
                                        action="{{ route('dashboard.student.destroy', $student->id) }}" method="POST">
                                        @csrf @method('DELETE')</form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No upload student found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
