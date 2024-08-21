@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'action' => null,
])

<div data-animated-container>
    <x-container :fluid="false">
        <div class="overflow-x-hidden">
            <div>
                <h2 data-animated-text
                    class="text-transparent webkit-text-stroke-width-3 webkit-text-stroke-white opacity-10 xl:text-[324px] lg:text-[200px] md:text-[170px] sm:text-[140px] text-[100px] whitespace-nowrap font-bold leading-135">
                    {{ $subtitle }}
                </h2>
            </div>
        </div>
    </x-container>
    <x-container :fluid="false">
        <x-container :fluid="true" class="relative ">
            <div
                class="xl:-mt-52 -mt-16 xl:ml-12.5 lg:ml-9 md:ml-7 ml-3 after:contents-[''] after:absolute after:left-[12px] after:top-0 after:w-[1px] after:h-full after:bg-white">
                <x-text theme="h3" as="h3" class="mb-5">
                    {{ $title}}
                </x-text>
                <span class="block w-[300px] h-[1px] bg-white"></span>
                <div class="flex md:flex-row flex-col justify-between md:items-center">
                    <div class="text-justify text-white lg:text-[35px] sm:text-3xl text-lg  font-semibold mt-8  md:mb-0 mb-7 !leading-160  flex-col  flex-wrap max-md:gap-y-8 gap-y-8 gap-x-12 ">
                       {!! $description !!}
                    </div>
                </div>
            </div>
        </x-container>
    </x-container>
</div>
