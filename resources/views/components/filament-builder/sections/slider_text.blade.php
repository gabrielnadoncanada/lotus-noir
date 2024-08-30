<x-container :fluid="true" class="lg:pt-30 2sm:pt-20 pt-14">
    <x-swiper
        :options="[
          'slidesPerView' => 1,
  'spaceBetween' => 0,
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

                    'slidesPerView' => 4
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
                    <div class="px-3 sm:px-4 flex flex-col gap-y-3">
                        <x-outline-svg-text :text="$key" />
                        <span
                            class="text-white font-bold leading-135 md:text-4xl text-3xl hover-underline">
                            {{ $title }}
                        </span>
                        <p class="font-normal  text-white">{{ $description }}</p>
                    </div>
                </x-swiper.item>
            @endforeach
        </x-swiper.wrapper>
        <x-container :fluid="false">
            <x-swiper.progress-and-navigation />
        </x-container>
    </x-swiper>
</x-container>

