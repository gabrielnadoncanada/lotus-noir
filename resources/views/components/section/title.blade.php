@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'action' => null,
])


<div>
    <div class="overflow-x-hidden">
        <div>
            <h2 data-animated-text
                class="text-transparent webkit-text-stroke-width-3 webkit-text-stroke-white opacity-10 xl:text-[324px] lg:text-[200px] md:text-[170px] sm:text-[140px] text-[100px] whitespace-nowrap font-bold leading-135">
                {{ $subtitle }}
            </h2>
        </div>
    </div>
    <x-container :fluid="true" class="relative">
        <div
            class="xl:-mt-52 -mt-16 xl:ml-12.5 lg:ml-9 md:ml-7 ml-3 after:contents-[''] after:absolute after:left-[12px] after:top-0 after:w-[1px] after:h-full after:bg-white">
            <h3 class="[font-size:_clamp(48px,7vw,130px)] font-bold leading-110 text-white mb-5 ">
                {{ $title}}
            </h3>
            <span class="block w-[300px] h-[1px] bg-white"></span>
            <div class="flex md:flex-row flex-col justify-between md:items-center">

                <h4 class="text-white lg:text-[35px] sm:text-3xl text-2xl font-semibold mt-4  md:mb-0 mb-7 !leading-160 flex flex-col md:flex-row max-md:gap-y-8 gap-x-12 ">
                    @foreach(explodeNewline($description) as $column)
                        <span class="flex-1">{!! $column !!}</span>
                    @endforeach
                </h4>

            </div>
        </div>
    </x-container>
</div>
