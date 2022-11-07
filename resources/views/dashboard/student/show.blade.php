@extends('includes.layouts.dashboard')

@section('module-name', 'Student')
@section('page-title', 'Students')

@section('content')
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Student Information Details </h5>
                </div>
                <div class="card-body">
                    <img src="{{ $student->getFirstMedia('thumbnail')->getUrl('thumbnail') }}"  class="img-thumbnail mb-4"/>
                    <div class="row">
                        <div class="mt-2">
                            <strong>Student Username: </strong>
                            <input value="{{ $student->username }}" class="form-control">
                        </div>
                        <div class="mt-3">
                            <strong>Full Name: </strong>
                            <input value="{{ $student->full_name }}" class="form-control">
                        </div>
                        <div class="mt-3">
                            <strong>Address: </strong>
                            <input value="{{ $student->address }}" class="form-control">
                        </div>
                        <div class="mt-3">
                            <strong>Email Address: </strong>
                            <input value="{{ $student->email }}" class="form-control">
                        </div>
                        <div class="col-6 mt-3">
                            <strong>Gender: </strong>
                            <input value="{{ $student->gender }}" class="form-control">
                        </div>
                        <div class="col-6 mt-3">
                            <strong>Contact Number: </strong>
                            <input value="{{ $student->contact_number }}" class="form-control">
                        </div>
                        <p class="mt-4">
                            <a href="{{ route('dashboard.student.index') }}" class="btn text-white btn-warning"><i class="fa fa-ban"></i> Cancel</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
