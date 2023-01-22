<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'Home') - {{ config('app.name', 'Laravel') }}</title>
    {{-- <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' /> --}}


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script>
        MathJax = {
          tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']]
          }
        };
        </script>
        <script id="MathJax-script" async
          src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
        </script>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="card rounded-0">
                <div class="card-body px-4 px-sm-3 px-md-5">
                    <div class="py-3">
                        <a href="{{ route("student.module.index") }}" class=""><i class="fa fa-arrow-left"></i> Back</a>
                    </div>

                    <div class="alert alert-danger" role="alert">
                        We are really sorry but you did not pass in assessment!.
                    </div>
                    <p>
                        Please see these reference
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Uploaded </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                                <tr>
                                    <td>{{ $file->file_name }}</td>
                                    <td>{{ ucfirst(basename($file->mime_type)) }}</td>
                                    <td>{{ $file->human_readable_size }}</td>
                                    <td>{{ $file->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('dashboard.file.download', $file->id) }}" class="btn btn-primary text-white py-1">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a onclick="if(confirm('Are you sure to delete?')){ document.getElementById('file-{{ $file->id }}').submit(); }"
                                            href="#" class="btn btn-danger text-white py-1">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="file-{{ $file->id }}" action="{{ route('dashboard.file.destroy', $file->id) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Files Uploaded</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <a href="{{ route('student.assessment.show', [$module->id, 'type' => 'retake']) }}" class="btn btn-primary text-white">Retake Assessment</a>
                </div>
            </div>
        </div>
    </div>
</body>
