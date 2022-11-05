<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("page-title", 'Home') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack("styles")
</head>
<body data-bs-spy="scroll" data-bs-target="#sidebar-menu">
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md text-white fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-white">
                    <div class="nav-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    @isMobile
                    <img src="/images/logo-square.jpg" style="position:absolute; height:58px; left: 68px; top:0"  alt="galactica logo">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div id="overlay-nav">
            <div class="container-fluid p-5">
                <div class="row">
                    <div class="col-sm-3">
                        <h2>
                            PRODUCTS & SERVICES
                        </h2>
                        <H4>
                            <a class="text-theme text-decoration-none b-block" href="#">ACCOMMODATION</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">TRANSFERS</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">EXCURSIONS</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">ADVENTURE</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">TAILOR MADE</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">ROUND TRIPS</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">CRUISES</a> <br>
                        </H4>
                    </div>
                    <div class="col-sm-3">
                        <h2>
                            OUR TECH SOLUTIONS
                        </h2>
                        <h4>
                            <a class="text-theme text-decoration-none b-block" href="#">UGO HOLIDAY</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">UGO PILGRIMAGE</a> <br>
                            <a class="text-theme text-decoration-none b-block" href="#">UGO DIVING</a> <br>
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <div id='map2' style=' height: 450px; border:1px solid red'></div>
                    </div>
                </div>
            </div>
        </div> --}}

        <main>
            @yield('content')
        </main>
        {{-- <footer @isDesktop class="pt-5" @endif>
            <div class="container">
                <div class="row text-white">
                    <div class="col-md-4 col-12 p-3"> 
                        <h5>
                            Get In Touch!
                        </h3>
                        	
                        <div>
                            JMC Centre, 6488 Medina St, Makati
                            1230 Metro Manila, Philippines
                        </div>
                        <div>+63 (2) 8810 4459 | +63 (2) 8818 3741</div>
                        <div>operation@galactica.com.ph</div>
                    </div>
                    <div class="col-md-4 col-12 p-3">
                        <h5>
                            Additional Resources
                        </h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                        </ul>
                        
                        <h5 class="mt-5">Travel Tips & Guide</h5>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum officia dolorum odit temporibus deleniti minima at accusamus, minus nemo deserunt, eligendi, ea iste incidunt esse. Aut fugit dicta eum assumenda?
                        Sequi voluptatum labore quia dolores blanditiis consequuntur, itaque esse dignissimos quae officia facere nisi molestiae nam voluptas atque nulla sed! Deleniti deserunt qui magnam ex incidunt recusandae pariatur iure ab!</p>
                    </div>
                    <div class="col-md-4 col-12 p-3">
                        <h5>
                            About Us
                        </h5>
                        <div class=" mb-3">
                            <img src="/images/logo-circle.png" style="width:100px" class="mw-100" alt="">
                        </div>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum officia dolorum odit temporibus deleniti minima at accusamus, minus nemo deserunt, eligendi, ea iste incidunt esse. Aut fugit dicta eum assumenda</p>
                    </div>
                </div>
            </div>
            <div class="bg-dark text-white pt-2 pb-2">
                <div class="container ">
                    © {{ date("Y") }} - {{ config("app.name") }} - All Rights Reserved.
                </div>
            </div>
        </footer> --}}
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack("scripts")
</body>
</html>
