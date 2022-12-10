@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')
    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <a href="{{ route('dashboard.module.index') }}" class="btn btn-primary text-white mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    Back
                </a>
                <div class="mb-5">
                    <h3>{{ $module->name }}</h1>
                    {{ $module->quarter->name }}, 
                    {{ $module->category->name }}
                    <p> 
                        {{ $module->details }}
                    </p>
                    <a href="{{ route("dashboard.module.edit", [$module->id, 'origin' => 'show']) }}"><i class="fa fa-edit"></i> Edit Module</a>
                </div>
                
                {{-- <div class="row">
                    <div class="col-sm-4 p-5">
                        @include("dashboard.module.includes.side")
                    </div>
                    <div class="col-sm-8"> --}}
                        @include("dashboard.module.includes.tab")
                        @yield("show-content")
                        <div class="py-5">
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>

    @yield("modal-content")
@endsection
