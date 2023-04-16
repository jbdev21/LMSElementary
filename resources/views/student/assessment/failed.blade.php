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
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="card rounded-0">
                <div class="card-body px-4 px-sm-3 px-md-5">
                    <div class="py-3">
                        <a href="{{ route('student.module.index') }}" class=""><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="text-center">
                        <img src="/images/keep-up.jpg" class="mw-100" alt="">
                    </div>

                    <div class="alert alert-warning" role="alert">
                        You almost got it. You did not pass but you can retake it. Dont give up, you can do this!.
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <p>
                                Please see these reference of each lesson:
                            </p>
                            @foreach ($lessons as $lesson)
                                <div class="mb-4">
                                    <label>{{ $lesson->name }}</label>
                                    @foreach ($lesson->media as $file)
                                        <div>
                                            <a target="_blank" href="{{ $file->getFullUrl() }}">{{ $file->file_name }}</a>
                                        </div>
                                    @endforeach
                                    @foreach ($lesson->links as $link)
                                        <div>
                                            <a target="_blank" href="{{ $link->url }}">{{ $link->url }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
        
        
                            <a href="{{ route('student.assessment.show', [$module->id, 'type' => 'retake']) }}"
                                class="btn btn-primary text-white">Retake Assessment</a>
                        </div>
                        <div class="col-sm-5">
                            {{-- <canvas  id="chartContainer" ></canvas> --}}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var config = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                            {{  $examination->moduleScore('correct')  }}, {{  $examination->moduleScore('correct') - $module->questions()->count()  }}
              ],
              backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)'
              ],
              label: 'Result'
            }],
            labels: [
                        'Correct',
                        'Wrong'
            ]
          },
          options: {
            responsive: true
          }
        };

        window.onload = function() {
          var ctx = document.getElementById('chartContainer').getContext('2d');
          window.myPie = new Chart(ctx, config);
        };
    </script> --}}
</body>
</html>