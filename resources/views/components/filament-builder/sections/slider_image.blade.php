<x-container :fluid="true" class="lg:pt-30 2sm:pt-20 pt-14 ">
    <x-swiper
        :options="[
            'slidesPerView' => 4,
            'spaceBetween' => 0,
            'breakpoints' => [
                0 => [
                    'slidesPerView' => 2
                ],
                560 => [
                    'slidesPerView' => 2
                ],
                1200 => [
                    'slidesPerView' => 3
                ],
                1400 => [
                    'slidesPerView' => 4
                ]
            ],
            'autoplay' => false,
            'pagination' => true,
            'loop' => true,
        ]">
        <x-swiper.wrapper>
            @foreach($items as $key => $item)
                <x-swiper.item>
                    <div class='px-3 sm:px-4 team-card'>
                        <div class="relative group">
                            <div class="block relative overflow-hidden w-full pt-[211.7%] mx-text-center">
                                <a class="magnetic-link " href="{{ $item['image'] ? Storage::url($item['image']) : '/img/placeholder.png' }}">
                                    <div class="absolute top-0 left-0 w-full h-full team-img bg-cover bg-center"
                                         style="background-image: url({{ $item['image'] ? Storage::url($item['image']) : '/img/placeholder.png' }});"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </x-swiper.item>
            @endforeach
        </x-swiper.wrapper>
        <x-container :fluid="false">
            <x-swiper.progress-and-navigation />
        </x-container>
    </x-swiper>
</x-container>

