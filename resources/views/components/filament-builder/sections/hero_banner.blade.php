@props([
    'title' => null,
    'image' => null,
])

<section class='relative' data-parallax-imgs>
    <x-swiper
        :options="[
            'slidesPerView' => 1,
            'spaceBetween' => 0,

            'breakpoints' => [
                0 => [
                    'slidesPerView' => 1
                ],

            ],
            'autoplay' => false,
            'pagination' => true,
            'loop' => false,
        ]">
        <x-swiper.wrapper>
            <x-swiper.item class=''>
                <div class="md:h-screen pt-[100px] "
                >
                    <x-container :fluid="true" class="h-full flex flex-col max-md:flex-col-reverse md:flex-row !px-0  ">
                        <div class="flex items-center h-full md:w-1/2 justify-center">
                            <x-filament-builder.blocks.heading
                                level="h1"
                                size="h1"
                                class="xl:text-[150px]  flex-1 max-md:p-8 max-md:pb-0 md:pl-[200px] !md:pb-[40px] max-w-4xl lg:text-[170px] 2sm:text-[130px] sm:text-[100px] xm:text-7xl text-5xl text-white"
                            >
                                <x-slot:text>
                                    {{$title}}
                                </x-slot:text>
                            </x-filament-builder.blocks.heading>
                        </div>

                        <div class=" md:w-1/2">
                            <x-filament-builder.blocks.image
                                class=" object-cover object-top h-full w-full aspect-square"
                                desktop_image="{{$image}}"></x-filament-builder.blocks.image>
                        </div>


                    </x-container>
                </div>
            </x-swiper.item>
        </x-swiper.wrapper>
    </x-swiper>
</section>
