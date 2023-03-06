@extends('includes.layouts.dashboard')

@section('module-name', 'Student')
@section('page-title', 'Students')

@section('content')
    <div class="card">
        <div class="card-header">
            Add New Student
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Student Thumbnail</label>
                        <input type="file" name="thumbnail" spellcheck="true" class="form-control" required>
                    </div>
                    <div class="col-8 mb-8">
                        <label>LRN</label>
                        <input type="text" name="username" spellcheck="true" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-4">
                        <label>Last Name</label>
                        <input type="text" name="last_name" spellcheck="true" class="form-control" required>
                    </div>
                    <div class="col-4 mb-4">
                        <label>First Name</label>
                        <input type="text" name="first_name" spellcheck="true" class="form-control" required>
                    </div>
                    <div class="col-4 mb-3">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" spellcheck="true" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-select">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" spellcheck="true" class="form-control" required>
                    </div>
                    <div class="col-4 mb-3">
                        <label>Contact Number</label>
                        <input type="number" name="contact_number" spellcheck="true" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Address</label>
                        <input type="text" name="address" spellcheck="true" class="form-control" required>
                    </div>
                    <div class="col-4 mb-3">
                        <label>Section</label>
                        <select name="section_id" class="form-select">
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mb-3">
                        <label>Password</label>
                        <input type="password"name="password" class="form-control" required>
                    </div>
                </div>
                <button class="btn text-white btn-primary mr-5" type="submit"><i class="fa fa-save"></i>
                    Save Changes</button>
                <a href="{{ route('dashboard.student.index') }}" class="btn text-white btn-secondary"><i
                        class="fa fa-ban"></i>
                    Cancel</a>
            </form>
        </div>
    </div>
@endsection
