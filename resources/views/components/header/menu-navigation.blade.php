<div class="md:w-1/3 w-full px-4">
    <nav
        x-show="menuActive"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-x-[100%] scale-80"
        x-transition:enter-end="opacity-100 translate-x-0 scale-100"
        x-transition:leave="transition ease-in-out duration-600 delay-100"
        x-transition:leave-start="opacity-100 translate-x-0 scale-100"
        x-transition:leave-end="opacity-0 translate-x-[100%] scale-80"
        class="flex items-center h-screen"
    >
        @php
            $menu =  App\Models\Navigation::find(app(App\Settings\ThemeSettings::class)->header_menu_id);
        @endphp
        @if($menu)
            <x-menu :items="$menu->items">
                menu
            </x-menu>
        @endif
    </nav>
</div>
