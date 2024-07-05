<div
    x-show="menuActive"
    x-transition:enter="transition transform ease-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition transform ease-in-out duration-300 delay-200"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    class="fixed top-0 right-0 w-screen h-screen z-98 bg-body">
    <div class="container mx-auto">
        <div class="flex gap-x-6 gap-y-5 justify-between">
            <x-header.menu-navigation />
            <x-header.menu-info />
        </div>
    </div>
</div>
