<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'Home') - {{ config('app.name', 'Laravel') }}</title>
    {{-- <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' /> --}}


    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
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
                <div class="card-body px-0 px-sm-3 px-md-5">
                    <div class="py-3">
                        <a href="#" class=""><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <h3 class="mb-4">
                        {{ $module->name }}
                    </h3>

                    <ol>
                        @foreach ($module->questions as $question)
                            <li class="mb-3">
                                <div>
                                   ${{ $question->body }}$
                                </div>
                                <ol class="text" type="a">
                                    @foreach ($question->options as $index => $option)
                                        <li>
                                            <div class="form-check">
                                                <input 
                                                    class="form-check-input" 
                                                    type="radio"
                                                    name="answer-{{ $question->id }}"
                                                    id="{{ $question->id }}-{{ $index }}">
                                                <label class="form-check-label"
                                                    for="{{ $question->id }}-{{ $index }}">
                                                    {{ $option }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</body>
