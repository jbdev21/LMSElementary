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
                                            <img src="{{ $student->getFirstMediaUrl('thumbnail') }}"  alt="user profile" class="mw-100" alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h4>{{ $student->full_name }}</h4>
                                    <span class="text-dark">Address: {{ $student->address }}</span>
                                    <br/>
                                    <span class="text-dark">Date Registered: {{ $student->created_at->format('M d, Y') }}</span>
                                    <ul class="mt-2"><strong>Gender:</strong> {{ ucfirst($student->gender) }}</ul>

                                    <hr/>
                                    <h5 class="mb-3">Contact Information</h5>
                                    <ul><strong>Email Address:</strong> {{ $student->email }}</ul>
                                    <ul><strong>Contact Number:</strong> {{ $student->contact_number }}</ul>

                                    <hr/>
                                    <h5 class="mb-3">Latest Assessment Score</h5>
                                    <ul>
                                        <strong>Module Name</strong>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                    </ul>
                                       
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
