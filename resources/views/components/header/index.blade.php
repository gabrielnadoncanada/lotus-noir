<header id="sticky-header" x-data="{ menuActive: false }"
        class="pl-8 pr-4 absolute left-0 top-0 w-full z-10 border-b-[rgba(255,255,255,0.12)] border-b border-solid">
    <div class="flex items-center justify-between h-[100px] z-[100] relative">
        <x-header.logo />
        <x-header.menu-toggle />
    </div>
    <x-header.navigation-menu />
</header>
