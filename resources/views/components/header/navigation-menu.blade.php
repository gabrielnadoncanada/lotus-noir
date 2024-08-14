<div
    class=" w-screen h-screen fixed z-[98] bg-background text-white translate-x-full duration-300 ease-in-out delay-[0.2s] right-0 top-0"
    :class="{ '!translate-x-0 delay-[0s]': menuActive }">
        <div class="container mx-auto">
            <div class="flex gap-x-6 gap-y-5 justify-between">

                <x-header.menu-navigation />
                <x-header.menu-info />
            </div>
        </div>
</div>
