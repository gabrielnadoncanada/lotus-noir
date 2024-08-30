<a href="/" class="default-link anima-link magnetic-link flex items-center gap-x-2">
    @if(app(App\Settings\ThemeSettings::class)->site_logo)
        <img
            class="h-[60px]  w-full"
            src="{{Storage::url(app(App\Settings\ThemeSettings::class)->site_logo)}}"
            alt="{{theme('site_title') ?: config('app.name')}}">
    @endif
</a>
