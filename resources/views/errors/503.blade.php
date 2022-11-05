@extends('layouts.empty')

@section("content")
@isDesktop()
<div id="home" class="video-header  min-vh-100">
    <video autoplay muted loop class="background-video-player mw-100">
        <source src="{{ asset("videos/bg.mp4") }}" type="video/mp4">
    </video>
</div>
@endif
@isMobile()
    <div class="d-flex align-items-center vh-100 bg-dark">
        <video autoplay muted loop class="mw-100" >
            <source src="{{ asset("videos/bg.mp4") }}" type="video/mp4">
        </video>
    </div>
@endif
@endsection
