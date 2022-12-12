@extends('includes.layouts.dashboard')

@section('module-name', 'Module')
@section('page-title', 'Modules')

@section('content')

    <div class="app-card shadow-sm mb-4">
        <div class="inner">
            <div class="app-card-body p-4">
                <h1 class="mb-3">Student Module</h1>
                <form>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div class="input-group mb-4">
                                <input name="q" type="text" class="form-control" value="{{ Request::get('q') }}"
                                    placeholder="Search for item..." name="q">
                                <button class="btn btn-primary text-white" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <ol class="list-group list-group-numbered">
                    @forelse ($modules as $module)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto pb-3">
                                <div class="fw-bold">
                                    <a href="{{ route("student.module.show", $module->id) }}">
                                        {{ $module->name }}
                                    </a>
                                </div>
                                <p>
                                    {{ $module->details }}
                                </p>

                                <a href="#" class="btn btn-success text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                    </svg> 
                                    Take Assessment
                                </a>
                                <span>
                                    {{ $module->lessons_count }} lessons
                                </span>
                                &nbsp;
                                &nbsp;
                                <span>
                                    {{ $module->questions_count }} questions
                                </span>
                            </div>
                            
                            <span class="badge bg-primary rounded-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                  </svg>
                            </span>
                        </li>
                    @endforeach
                </ol>
                
                {{ $modules->appends([
                    'q' => request()->q,
                ])->links() }}
            </div>
        </div>
    </div>
@endsection
