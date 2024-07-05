<div class="lg:h-[100px] bg-body  flex justify-start items-center h-[75px] duration-300 ease-in-out px-4 md:px-10 py-0">
    <a href="/" class="default-link anima-link">
        @if(app(App\Settings\ThemeSettings::class)->site_logo)
            <img
                class="max-w-[160px] w-full"
                src="{{Storage::url(app(App\Settings\ThemeSettings::class)->site_logo)}}"
                alt="Mireya">
        @endif
    </a>
</div>
