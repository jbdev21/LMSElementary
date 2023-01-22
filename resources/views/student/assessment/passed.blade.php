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
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card rounded-0  mt-3 p-5 text-center">
                        <div class="card-body px-4 px-sm-3 px-md-5">
                           <div class="text-center">
                            <div class="success-checkmark">
                                <div class="check-icon">
                                  <span class="icon-line line-tip"></span>
                                  <span class="icon-line line-long"></span>
                                  <div class="icon-circle"></div>
                                  <div class="icon-fix"></div>
                                </div>
                              </div>
                           </div>
        
                            <div class="alert alert-success" role="alert">
                                Greate Job! You passed in the assessment
                            </div>
                            <a class="btn btn-success text-white btn-lg" href="{{  route("student.module.show", $module->id) }}">Proceed</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
