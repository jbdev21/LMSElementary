@extends('includes.layouts.dashboard')

@section('module-name', 'Student')
@section('page-title', 'Students')

@section('content')
<div class="app-card shadow-sm mb-4 border-left-decoration">
        <div class="inner">
            <div class="app-card-body p-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard.dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.student.index') }}">Students</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $student->full_name }}</li>
                </ol>
              </nav>
                
            <div class="row gx-5 gy-3">
                <div class="col-lg-4 col-md-4 col-sm-5 col-12">
                    <div class="app-card mb-4">
                        <div class="app-card-body p-4">
                                <label class="mb-4"><h4>Student Information</h4></label>
                                <div class="mb-4">
                                    <div class="text-center">
                                        <label for="thumbnail" class="d-block mb-2">
                                            <img src="{{ $student->getFirstMediaUrl('thumbnail') }}"  alt="user profile" class="img-thumbnail mw-100" alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <p><strong>Full Name:</strong> {{ $student->full_name }}</p>
                                    <p><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
                                    <p><strong>Address:</strong> {{ $student->address }}</p>
                                    <p><strong>Email Address:</strong> {{ $student->email }}</p>
                                    <p><strong>Contact Number:</strong> {{ $student->contact_number }}</p>
                                </div>
                        </div>
                    </div>
                </div>
                <!--// new col-->
                <div class="col-lg-8 col-sm-7">
                    <div class="app-card mb-4">
                        <div class="app-card-body p-4">
                            <label class="mb-4"><h4>Student Modules</h4></label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Uploaded</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        </td>
                                    </tr>
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
