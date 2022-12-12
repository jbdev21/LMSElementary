@extends('includes.layouts.dashboard')

@section('module-name', 'Section')
@section('page-title', 'Edit Section')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Edit Section
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.section.update', $section->id) }}" method="post">
                        @csrf @method('PUT')
                        <p>
                            Name
                            <input value="{{ $section->name }}" type="text" required name="name" spellcheck="true"
                                class="form-control">
                        </p>
                        <p>
                            <button class="btn text-white btn-primary" type="submit"><i class="fa fa-save"></i>
                                Save Changes</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
