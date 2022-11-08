@extends('includes.layouts.dashboard')

@section('page-title', 'Acounts')

@section('content')

<div class="app-card shadow-sm mb-4 border-left-decoration">
    <div class="inner">
        <div class="app-card-body p-4">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Accounts</li>
            </ol>
            </nav>
             <form action="{{ route('dashboard.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gx-5 gy-4">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-12">
                        <div class="app-card mb-4">
                            <div class="app-card-body p-4">
                                <label> <h4>Credentials Information</h4></label>
                                <div class="mb-4">
                                    <label for="">Profile</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>
                                <div class="mb-3">
                                    <label for="">User Name</label>
                                    <input type="text" class="form-control mb-2" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control mb-2" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary text-white mt-3"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                    </div><!--//col-->
                    <div class="col-lg-7 col-sm-7">
                        <div class="app-card mb-4">
                            <div class="app-card-body p-4">
                                <label> <h4 class="mb-4">Account Detail</h4></label>
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control mb-2" name="last_name" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control mb-2" name="first_name" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" class="form-control mb-2" name="middle_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control mb-2" name="address" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="">Contact</label>
                                        <input type="text" class="form-control mb-2" name="contact_number" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control mb-2" name="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--//col-->
                </div><!--//row-->
            </form>
        </div><!--//app-card-body-->
    </div><!--//inner-->
</div><!--//app-card-->
@endsection