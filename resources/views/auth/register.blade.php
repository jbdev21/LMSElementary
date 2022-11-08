@extends('layouts.empty')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                          <img src="/images/logo.png" alt="logo" width="120" height="120">
                        <h4 class="logo-text text-success mt-3">WEB-BASED STUDENT LEARNING SYSTEM</h4>
                    </div>
                </div>

                    <h5 class="text-primary text-center mt-4">Student Registration Form</h5>
                    <hr/>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                         <div class="row">
                            <div class="col-4 mb-3">
                                <label>Student Thumbnail</label>
                                <input type="file" name="photo" spellcheck="true" class="form-control" required>
                            </div>
                            <div class="col-8 mb-8">
                                <label>Student ID</label>
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
                        <div class="col-8 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" spellcheck="true" class="form-control" required>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-6">
                                <label>Confirmed Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <small class="text-muted">*If already registered, please log in</small>
                                <a href="/">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
