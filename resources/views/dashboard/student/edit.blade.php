@extends('includes.layouts.dashboard')

@section('module-name', 'Student')
@section('page-title', 'Students')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Student
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.student.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
                <img src="{{ $student->getFirstMedia('thumbnail')->getUrl('thumbnail') }}"  class="img-thumbnail"/>
            <div class="row">
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Student Thumbnail</label>
                        <input type="file" name="photo" spellcheck="true" class="form-control">
                    </div>
                    <div class="col-8 mb-8">
                        <label>Student ID</label>
                        <input type="text" name="username" spellcheck="true" class="form-control" value="{{ $student->username }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-4">
                        <label>Last Name</label>
                        <input type="text" name="last_name" spellcheck="true" class="form-control" value="{{ $student->last_name }}">
                    </div>
                    <div class="col-4 mb-4">
                        <label>First Name</label>
                        <input type="text" name="first_name" spellcheck="true" class="form-control" value="{{ $student->first_name }}">
                    </div>
                    <div class="col-4 mb-3">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" spellcheck="true" class="form-control" value="{{ $student->middle_name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-select">
                            <option value="female">Female</option>
                            <option value="male" @if($student->gender == 'male') selected @endif>Male</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" spellcheck="true" class="form-control" value="{{ $student->email }}">
                    </div>
                    <div class="col-4 mb-3">
                        <label>Contact Number</label>
                        <input type="number" name="contact_number" spellcheck="true" class="form-control" value="{{ $student->contact_number }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label>Address</label>
                        <input type="text" name="address" spellcheck="true" class="form-control" value="{{ $student->address }}">
                    </div>
                    <div class="col-4 mb-3">
                        <label>Section</label>
                        <select name="section_id" class="form-select">
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}" @if($student->section_id == $section->id) selected @endif>{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mb-3">
                        <label>Password <small>**if password provide, will overide the current password</small></label>
                        <input type="password"name="password" class="form-control">
                    </div>
                </div>
                <p>
                    <button class="btn text-white btn-primary" type="submit"><i class="fa fa-save"></i>
                        Save Changes
                    </button>
                    <a href="{{ route('dashboard.student.index') }}" class="btn text-white btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
