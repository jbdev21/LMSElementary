<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.sections.header')
    <body class="app">
        <div id="app">
            <header class="app-header fixed-top">	
                @include('includes.menus.dashboard.top')
                @include('includes.menus.dashboard.side')
            </header>

            <div class="app-wrapper">
                
                <div class="app-content pt-3 p-md-3 p-lg-4">
                    <div class="container-fluid">
                        @if (flash()->message)
                            <div class="alert {{ flash()->class }} alert-dismissible fade show" role="alert">
                                {{ flash()->message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif 
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
                @include('includes.sections.footer')
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
