@if(!empty($blocks))
    <section class="my-10 max-w-7xl mx-auto sm:my-15 md:my-20 relative" data-section="slideshow">
        <div x-data="Components.swiper({{json_encode($options)}})"
             class="{{"slider-template-$template"}} ">
            @if($template != 'full-screen' && $options['navigation']['enabled'])
                <x-builder.partials.slideshow-navigation class="pb-10" />
            @endif
            <div class="swiper-container" x-ref="container">

                <div class="swiper-wrapper">
                    @foreach ($blocks as $block)
                        <div class="swiper-slide overflow-hidden relative group">
                            <x-render-section :section="$block" />
                        </div>
                    @endforeach
                </div>
            </div>
            @if($template == 'full-screen')
                @if($options['pagination']['enabled'])
                    <x-builder.partials.slideshow-pagination />
                @endif
                @if($options['navigation']['enabled'])
                    <x-builder.partials.slideshow-navigation />
                @endif
            @endif
        </div>
    </section>
@endif
