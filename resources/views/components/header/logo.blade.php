<a href="/" class="default-link anima-link">
    @if(app(App\Settings\ThemeSettings::class)->site_logo)
        <img
            class="max-w-[160px] w-full"
            src="{{Storage::url(app(App\Settings\ThemeSettings::class)->site_logo)}}"
            alt="{{config('app.name')}}">
    @endif
</a>
