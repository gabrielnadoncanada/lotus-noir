<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="is-animating overflow-x-hidden h-full">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ app(App\Settings\ThemeSettings::class)->site_title || config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("css/plugins/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset('js/plugins/lightgallery/css/lightgallery-bundle.css') }}">
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
<body class="h-full m-0 p-0">
<div class="relative flex flex-col h-full">
    <x-header />
    <main class="transition-fade flex-1">
        {{ $slot }}
    </main>
    <x-footer />
</div>

@livewireScripts
<script src="{{asset("js/plugins/jquery.min.js")}}"></script>
<script src="{{asset("js/plugins/lenis.min.js")}}"></script>
<script src="{{asset("js/plugins/parsley.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>

<script src="{{ asset('js/plugins/lightgallery/lightgallery.min.js') }}"></script>
<script src="{{ asset('js/plugins/lightgallery/plugins/thumbnail/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('js/plugins/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
<script>
    document.querySelectorAll('[data-content="content_section"]').forEach((card, index) => {
        lightGallery(card, {
            plugins: [lgZoom, lgThumbnail],
            selector: '.team-card a',
            thumbnail: false,
            animateThumb: false,
        });
    });
</script>
</body>
</html>
