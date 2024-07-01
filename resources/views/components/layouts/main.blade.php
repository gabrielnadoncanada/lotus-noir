<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="is-animating">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("css/plugins/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/plugins/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/plugins/fancybox.min.css")}}">
    <link href="{{asset("css/plugins/mapbox-style.css")}}" rel='stylesheet'>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @if(theme('site_fav_icon'))
        <link rel="icon" href="{{Storage::url(theme('site_fav_icon'))}}" sizes="32x32">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-partials.meta :meta="$meta"/>
</head>
<body class="{{str_replace('.','-',Route::getCurrentRoute()->getName())}}">
@if (session('status'))
    <x-alert :message="session('status')" theme="success"></x-alert>
@endif
<div class="app">
    <x-header/>
    <main class="transition-fade">
        <canvas class="dots" width="835" height="1347" style="display: none;"></canvas>
        {{ $slot }}
    </main>
    @if(request()->path() !== '/')
        <x-footer/>
    @endif
</div>


<script src="{{asset("js/plugins/jquery.min.js")}}"></script>
<script src="{{asset("js/plugins/tween-max.min.js")}}"></script>
<script src="{{asset("js/plugins/scroll-magic.js")}}"></script>
<script src="{{asset("js/plugins/scroll-magic-gsap-plugin.js")}}"></script>
<script src="{{asset("js/plugins/swiper.min.js")}}"></script>
<script src="{{asset("js/plugins/isotope.min.js")}}"></script>
<script src="{{asset("js/plugins/fancybox.min.js")}}"></script>
<script src="{{asset("js/plugins/mapbox.min.js")}}"></script>
<script src="{{asset("js/plugins/smooth-scrollbar.min.js")}}"></script>
<script src="{{asset("js/plugins/overscroll.min.js")}}"></script>

<script src="{{asset("js/plugins/parsley.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
<script src="{{asset("js/plugins/canvas.js")}}"></script>
</body>
</html>
