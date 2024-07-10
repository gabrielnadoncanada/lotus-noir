<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="is-animating overflow-x-hidden h-full">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("css/plugins/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/plugins/fancybox.min.css")}}">
    <link href="{{asset("css/plugins/mapbox-style.css")}}" rel='stylesheet'>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @if(theme('site_fav_icon'))
        <link rel="icon" href="{{Storage::url(theme('site_fav_icon'))}}" sizes="32x32">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles


    @if($meta)
        <x-layouts.meta :meta="$meta" />
    @endif
</head>
<body class="h-full bg-body m-0 p-0">

<div class="relative flex flex-col h-full">
    <x-header />
    <canvas class="dots absolute w-full h-screen opacity-60 left-0 top-0" width="835" height="1347"
            style="display: none;"></canvas>

    <main class="transition-fade flex-1">
        {{ $slot }}
    </main>
    @if(request()->path() !== '/')
        <x-footer />
    @endif
</div>

@livewireScripts
<script src="{{asset("js/plugins/jquery.min.js")}}"></script>
<script src="{{asset("js/plugins/scroll-magic.js")}}"></script>
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
