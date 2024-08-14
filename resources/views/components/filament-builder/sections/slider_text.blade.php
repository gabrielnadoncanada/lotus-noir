
<x-container :fluid="false" class="lg:pt-30 2sm:pt-20 pt-14 lg:!pl-[120px] max-md:overflow-hidden">
    <x-swiper
        :options="[
          'slidesPerView' => 1,
            'spaceBetween' => 90,
            'breakpoints' => [
                0 => [
                    'slidesPerView' => 1
                ],
                768 => [
                    'slidesPerView' => 2
                ],
                1200 => [
                    'slidesPerView' => 3
                ],

                1650 => [
                     'spaceBetween' => 60,
                    'slidesPerView' => 3
                ]
            ],
              'autoplay' => false,
            'pagination' => true,
            'loop' => false,
        ]">
        <x-swiper.wrapper>
            @foreach($items as $key => $item)
                @php
                    $key++;
                    $key = $key < 10 ? '0' . $key : $key;
                    $title = $item['title'];
                    $description = $item['description'];
                @endphp
                <x-swiper.item>
                    <div class="px-3 sm:px-0 flex flex-col gap-y-3">
                        <x-outline-svg-text :text="$key" />
                        <span
                            class="mt-4 text-white font-bold leading-135 md:text-4xl text-3xl hover-underline">
                            {{ $title }}
                        </span>
                        <p class="text-justify font-normal text-2xl/10 text-white">{{ $description }}</p>
                    </div>
                </x-swiper.item>
            @endforeach
        </x-swiper.wrapper>
        <x-container :fluid="true">
            <x-swiper.progress-and-navigation />
        </x-container>
    </x-swiper>
</x-container>

