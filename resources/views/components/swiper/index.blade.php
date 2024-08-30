@props([
    'options' => [],
    'template' => 'horizontal-1',
    'swipe_on_mobile' => false,
])

<div
    x-data="Components.swiper({{json_encode($options)}}, {{$swipe_on_mobile}})"
    {{$attributes->merge(['class' => "slider-template-$template"])}}
>
    <div class="swiper swiper-container" x-ref="container">
        {{$slot}}
    </div>
</div>
