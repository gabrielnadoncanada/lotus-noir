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
                <div class="min-h-[500px] h-[calc(100vh-100px)]"
                >
                    <x-container
                        class="h-full gap-x-8 flex  flex-col max-md:flex-col-reverse md:flex-row">
                        <div class="flex items-center h-full md:w-1/2 justify-center">
                            <x-filament-builder.blocks.heading
                                level="h1"
                                size="h1"
                                class="whitespace-pre-line md:text-[100px] xl:text-[150px]  flex-1  max-md:pb-0   !md:pb-[40px] max-w-4xl  2sm:text-[130px] sm:text-[100px] xm:text-7xl text-5xl text-white"
                                :text="$title"
                            />
                        </div>


                    </x-container>

                    <div class="absolute  z-[-1] top-0 bottom-0 right-0 md:w-1/2 ">

                        <x-filament-builder.blocks.image
                            class=" object-cover object-top h-full w-full aspect-square"
                            desktop_image="{{$image}}"></x-filament-builder.blocks.image>
                    </div>
                    <div class="absolute md:hidden z-[-1]  bottom-0 right-0 md:w-1/2 bg-background opacity-50  h-full w-full z-1"></div>
                </div>
            </x-swiper.item>
        </x-swiper.wrapper>
    </x-swiper>
</section>
